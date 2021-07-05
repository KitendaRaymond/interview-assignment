<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhoneValidationTest extends TestCase
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

    public function testSuccessfulPhoneValidationOption1()
    {

        $maxData = [
            "phoneNumber" => "256757918410"
            
        ];

        $this->json('POST', 'api/phones/validate', $maxData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'phoneStatus'
            ]);
    }

    public function testSuccessfulPhoneValidationOption2()
    {

        $maxData = [
            "phoneNumber" => "0757918410"
            
        ];

        $this->json('POST', 'api/phones/validate', $maxData, ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure([
            'phoneStatus'
        ]);
    }

    public function testFailedPhoneValidationOption1()
    {

        $maxData = [
            "phoneNumber" => "075791841"
            
        ];

        $this->json('POST', 'api/phones/validate', $maxData, ['Accept' => 'application/json'])
        ->assertStatus(400)
        ->assertJsonStructure([
            'phoneStatus'
        ]);
    }

    public function testFailedPhoneValidationOption2()
    {

        $maxData = [
            "phoneNumber" => "25675791841"
            
        ];

        $this->json('POST', 'api/phones/validate', $maxData, ['Accept' => 'application/json'])
        ->assertStatus(400)
        ->assertJsonStructure([
            'phoneStatus'
        ]);
    }

    public function testFailedPhoneValidationWithString()
    {

        $maxData = [
            "phoneNumber" => "sampleString"
            
        ];

        $this->json('POST', 'api/phones/validate', $maxData, ['Accept' => 'application/json'])
        ->assertStatus(400)
        ->assertJsonStructure([
            'phoneStatus'
        ]);
    }



    public function testMandatoryPhoneNumberPass()
    {

        $this->json('POST', 'api/phones/validate')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'phoneNumber' => ["The phone number field is required."]
                ]
            ]);

    }

    public function testSuccessfulPhoneFormatOption1()
    {

        $maxData = [
            "phoneNumber" => "256757918410"
            
        ];

        $this->json('POST', 'api/phones/format', $maxData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'phoneStatus',
                'phoneNumber',
                'message'
            ]);
    }

    public function testSuccessfulPhoneFormatOption2()
    {

        $maxData = [
            "phoneNumber" => "0757918410"
            
        ];

        $this->json('POST', 'api/phones/format', $maxData, ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure([
            'phoneStatus',
            'phoneNumber',
            'message'
        ]);
    }

    public function testFailedPhoneFormatOption1()
    {

        $maxData = [
            "phoneNumber" => "075791841"
            
        ];

        $this->json('POST', 'api/phones/format', $maxData, ['Accept' => 'application/json'])
        ->assertStatus(400)
        ->assertJsonStructure([
            'phoneStatus',
            'phoneNumber',
            'message'
        ]);
    }

    public function testFailedPhoneFormatOption2()
    {

        $maxData = [
            "phoneNumber" => "25675791841"
            
        ];

        $this->json('POST', 'api/phones/format', $maxData, ['Accept' => 'application/json'])
        ->assertStatus(400)
        ->assertJsonStructure([
            'phoneStatus',
            'phoneNumber',
            'message'
        ]);
    }

    public function testMandatoryPhoneNumberPassFormat()
    {

        $this->json('POST', 'api/phones/format')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'phoneNumber' => ["The phone number field is required."]
                ]
            ]);

    }


}
