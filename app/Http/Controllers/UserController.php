<?php

namespace App\Http\Controllers;

use App\Http\Responses\UserResponse;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /** @var UserService $userService */
    public UserService $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @OA\Get  (
     *      path="/api/users",
     *      summary="Получение списка пользователей",
     *      tags={ "CarsRent" },
     *
     *
     *      @OA\Response(
     *          response=200, description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data", type="array",
     *                  @OA\Items(type="object", ref="#components/schemas/UserResponse")
     *              ),
     *          ),
     *      )
     * )
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResponse::collection($this->userService->getAllUsers());
    }

    public function getFreeCars()
    {
        return [];
    }
}
