<?php

namespace App\Http\Responses;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      schema="RentResponse",
 *      title="RentResponse",
 *
 *      @OA\Property(property="id", type="intager", example=11),
 *      @OA\Property(property="userId", type="intager", example=11),
 *      @OA\Property(property="userName", type="string", example="Test User"),
 *      @OA\Property(property="userEmail", type="string", example="test@example.com"),
 *      @OA\Property(property="carId", type="intager", example=11),
 *      @OA\Property(property="carName", type="string", example="Mazda"),
 *      @OA\Property(property="startRent", type="string", example="08.10.2022"),
 *      @OA\Property(property="endRent", type="string", example="09.10.2022"),
 * ),
 *
 * @mixin Rent
 */
class RentResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'userName' => $this->user->name,
            'userEmail' => $this->user->email,
            'carId' => $this->car_id,
            'carName' => $this->car->name,
            'startRent' => $this->start_rent,
            'endRent' => $this->end_rent,
        ];
    }


}
