<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentStoreRequest;
use App\Http\Responses\RentResponse;
use App\Services\RentService;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RentController extends Controller
{
    /** @var RentService $rentService */
    public RentService $rentService;

    /**
     * RentController constructor.
     * @param RentService $rentService
     */
    public function __construct(RentService $rentService)
    {
        $this->rentService = $rentService;
    }

    /**
     * @OA\Get  (
     *      path="/api/rents",
     *      summary="Получение списка аренды машин",
     *      tags={ "CarsRent" },
     *
     *
     *      @OA\Response(
     *          response=200, description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data", type="array",
     *                  @OA\Items(type="object", ref="#components/schemas/RentResponse")
     *              ),
     *          ),
     *      )
     * )
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return RentResponse::collection($this->rentService->getRents());
    }

    /**
     * @OA\Post  (
     *      path="/api/rents",
     *      summary="Арендовать машину",
     *      tags={ "CarsRent" },
     *
     *      @OA\Parameter(in="query", name="carId", required=true,
     *          description="ID машины",
     *          @OA\Schema(type="integer", example=1),
     *      ),
     *
     *      @OA\Parameter(in="query", name="userId", required=true,
     *          description="ID пользователя",
     *          @OA\Schema(type="integer", example=11),
     *      ),
     *
     *      @OA\Parameter(in="query", name="startRent", required=true,
     *          description="Дата начала аренды",
     *          @OA\Schema(type="string", example="08.10.2022"),
     *      ),
     *
     *      @OA\Parameter(in="query", name="endRent", required=true,
     *          description="Дата конца аренды",
     *          @OA\Schema(type="string", example="09.10.2022"),
     *      ),
     *
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#components/schemas/RentRequest"),
     *      ),
     *
     *      @OA\Response(response=200, description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data", type="object", ref="#components/schemas/RentResponse"
     *              ),
     *          ),
     *      )
     * )
     *
     *
     * @param RentStoreRequest $request
     * @return RentResponse
     * @throws Exception
     */
    public function store(RentStoreRequest $request): RentResponse
    {
        return new RentResponse($this->rentService->setRent(
            $request->get('carId'),
            $request->get('userId'),
            $request->get('startRent'),
            $request->get('endRent'),
        ));
    }
}
