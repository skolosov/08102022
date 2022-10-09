<?php

namespace Tests\Feature;

use Tests\TestCase;

class CarTest extends TestCase
{
    private array $responseJsonData = ['data' =>
        ['*' => [
            'id',
            'name',
        ]]
    ];

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCars()
    {
        $response = $this->get('/api/cars');
        $response->assertOk();
        $response->assertJsonStructure($this->responseJsonData);
    }

    public function testCarsFree()
    {
        $response = $this->get('/api/cars/free');
        $response->assertOk();
        $response->assertJsonStructure($this->responseJsonData);
    }
}
