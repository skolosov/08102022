<?php

namespace App\Http\Responses;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      schema="CarResponse",
 *      title="CarResponse",
 *
 *      @OA\Property(property="id", type="intager", example=1),
 *      @OA\Property(property="name", type="string", example="Mazda"),
 * ),
 *
 * @mixin Car
 */
class CarResponse extends JsonResource
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
            'name' => $this->name,
        ];
    }


}
