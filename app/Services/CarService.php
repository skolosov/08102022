<?php


namespace App\Services;


use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

class CarService
{
    /**
     * @return Collection
     */
    public function getAllCars(): Collection
    {
        return Car::all();
    }

    /**
     * @return Collection
     */
    public function getFreeCars(): Collection
    {
        return Car::query()->freeCars()->get();
    }
}
