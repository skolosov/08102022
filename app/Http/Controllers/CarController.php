<?php

namespace App\Http\Controllers;

use App\Http\Responses\CarResponse;
use App\Services\CarService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarController extends Controller
{
    /** @var CarService $carService */
    public CarService $carService;

    /**
     * CarController constructor.
     * @param CarService $carService
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * @OA\Get  (
     *      path="/api/cars",
     *      summary="Получение списка машин",
     *      tags={ "CarsRent" },
     *
     *
     *      @OA\Response(
     *          response=200, description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data", type="array",
     *                  @OA\Items(type="object", ref="#components/schemas/CarResponse")
     *              ),
     *          ),
     *      )
     * )
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CarResponse::collection($this->carService->getAllCars());
    }

    /**
     * @OA\Get  (
     *      path="/api/cars/free",
     *      summary="Получение списка свободных машин",
     *      tags={ "CarsRent" },
     *
     *
     *      @OA\Response(
     *          response=200, description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data", type="array",
     *                  @OA\Items(type="object", ref="#components/schemas/CarResponse")
     *              ),
     *          ),
     *      )
     * )
     *
     * @return AnonymousResourceCollection
     */
    public function freeCars(): AnonymousResourceCollection
    {
        return CarResponse::collection($this->carService->getFreeCars());
    }
}
