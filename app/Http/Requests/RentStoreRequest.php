<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="RentRequest",
 *      title="RentRequest",
 *      @OA\Property(property="carId", type="int", example=1),
 *      @OA\Property(property="userId", type="int", example=10),
 *      @OA\Property(property="startRent", type="string", example="08.10.2022"),
 *      @OA\Property(property="endRent", type="string", example="09.10.2022"),
 *  ),
 *
 * @property int $carId
 * @property int $userId
 * @property string $startRent
 * @property string $endRent
 */
class RentStoreRequest extends FormRequest
{
    /**
     * @return array
     */
    public function validationData(): array
    {
        return $this->only(
            [
                'carId',
                'userId',
                'startRent',
                'endRent',
            ]
        );
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'carId' => 'required|int',
            'userId' => 'required|int',
            'startRent' => 'required|string',
            'endRent' => 'required|string'
        ];
    }
}
