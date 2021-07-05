<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaccoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }


    //This function creates a test to ensure users can add a sacco successfully

    /*
    public function testSuccessfulCreation()
    {

        $saccoData = [
            "sacconame" => "Ensibuuko Sacco West",
            "country" => "Uganda"
            
        ];

        $this->json('POST', 'api/saccos', $saccoData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "sacco" => [
                    'id',
                    'name',
                    'country',
                    'created_at',
                    'updated_at'
                ],
                "message"
            ]);
    }

    public function testSaccosListedSuccessfully()
    {

        $this->json('GET', 'api/saccos', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "saccos" => [
                    [
                        "id" => 1,
                        "name" => "Ensibuuko Eastern Sacco",
                        "country" => "Uganda",
                        "created_at" => "2021-06-30 07:02:03",
                        "updated_at" => "2021-06-30 07:02:03"
                    ],
                    [
                        "id" => 2,
                        "name" => "Ensibuuko Western Sacco",
                        "country" => "Uganda",
                        "created_at" => "2021-06-30 07:02:03",
                        "updated_at" => "2021-06-30 07:02:03"
                    ]
                ],
                "message" => "Retrieved successfully"
            ]);
    }
    */
}
