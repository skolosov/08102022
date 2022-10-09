<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUsers()
    {
        $response = $this->get('/api/users');
        $response->assertOk();
        $response->assertJsonStructure(['data' =>
            ['*' => [
                'id',
                'name',
                'email',
            ]]
        ]);
    }
}
