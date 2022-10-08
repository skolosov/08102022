<?php


namespace App\Services;


use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class RentService
{
    /**
     * @return Collection
     */
    public function getRents(): Collection
    {
        return Rent::with(['car', 'user'])->get();
    }


    /**
     * @param int $carId
     * @param int $userId
     * @param string $startRent
     * @param string $endRent
     * @return void
     * @throws Exception
     */
    public function setRent(int $carId, int $userId, string $startRent, string $endRent): void
    {
        $start = Carbon::parse($startRent)->addSecond();
        $end = Carbon::parse($endRent);
        /** @var Rent $rentUser */
        $rentUser = User::query()->findOrFail($userId)->rent;
        $isUserBusy = $rentUser && Carbon::parse($rentUser->end_rent) > $start;

        /** @var Rent $rentCar */
        $rentCar = Car::query()->findOrFail($carId)->rent;
        $isCarBusy = $rentCar && Carbon::parse($rentCar->end_rent) > $start;

        if ($isUserBusy || $isCarBusy) {
            if ($isUserBusy) {
                throw new Exception('Пользователь занят');
            }
            if ($isCarBusy) {
                throw new Exception('Машина занята');
            }
        }

        Rent::query()->create([
            'car_id' => $carId,
            'user_id' => $userId,
            'start_rent' => $start,
            'end_rent' => $end,
        ]);
    }
}
