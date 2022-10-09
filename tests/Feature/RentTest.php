<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RentTest extends TestCase
{
    use RefreshDatabase;

    private array $responseJsonData = [
        'id',
        'userId',
        'userName',
        'userEmail',
        'carId',
        'carName',
        'startRent',
        'endRent',
    ];

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRents()
    {
        $response = $this->get('/api/rents');
        $response->assertOk();
        $response->assertJsonStructure(['data' => [
            '*' => $this->responseJsonData
        ]]);
    }

    public function testRentStore()
    {
        $response = $this->withoutExceptionHandling()
            ->post('/api/rents', [
                'carId' => rand(1, 20),
                'userId' => rand(1, 11),
                'startRent' => Carbon::now()->format('d.m.Y'),
                'endRent' => Carbon::now()->addDay()->format('d.m.Y'),
            ]);
        $response->assertCreated();
        $response->assertJsonStructure(['data' => $this->responseJsonData]);
    }
}
