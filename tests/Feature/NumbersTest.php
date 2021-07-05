<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumbersTest extends TestCase
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

    public function testSuccessfulNumbersLogic()
    {

        $maxData = [
            "maximum" => "15"
            
        ];

        $this->json('POST', 'api/numbers', $maxData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "comments" => [
                    
                ],
                "message"
            ]);
    }

    public function testMandatoryMaximumNumberPass()
    {

        $this->json('POST', 'api/numbers')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'maximum' => ["The maximum field is required."]
                ]
            ]);

    }

}
