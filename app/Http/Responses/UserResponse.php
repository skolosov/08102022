<?php

namespace App\Http\Responses;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      schema="UserResponse",
 *      title="UserResponse",
 *
 *      @OA\Property(property="id", type="intager", example=11),
 *      @OA\Property(property="name", type="string", example="Test User"),
 *      @OA\Property(property="email", type="string", example="test@example.com"),
 * ),
 *
 * @mixin User
 */
class UserResponse extends JsonResource
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
            'email' => $this->email,
        ];
    }


}
