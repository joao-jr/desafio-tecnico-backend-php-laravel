<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class UserQuotationTest extends TestCase
{
    use RefreshDatabase;
    private $user;
    private $token;
    private $url;

    protected function setUp():void
    {
        $this->token = Str::random(60);
        parent::setUp();
        $this->user = factory(\App\User::class)->create(
            [
                'name' => 'Bob',
                'email' => 'bob@linhadireta.org',
                'password' => bcrypt('password'),
                'api_token' => hash('sha256', $this->token),
            ]
        );

        $this->url = "/api/user/quotation";
    }

    public function testUserAddQuotationMissingFields()
    {
        $response = $this->actingAs($this->user, 'api')
        ->json(
            'POST',
            $this->url,
            []
        );
        $response
            ->assertStatus(422)
            ->assertJson(
                [
                    "message" => "The given data was invalid.",
                  "errors" => [
                    "description" => [
                        "Informe a descrição."
                    ],
                    "address" => [
                        "Informe o endereço."
                    ],
                    "street_number" => [
                        "Informe o número."
                    ],
                    "neighborhood" => [
                        "Informe o bairro."
                    ],
                    "city" => [
                        "Informe a cidade."
                    ],
                    "state" => [
                        "Informe o estado."
                    ],
                    "uf" => [
                        "Informe a UF."
                    ],
                    "zip_code" => [
                        "Informe o CEP."
                    ],
                    "contact_name" => [
                        "Informe o nome para contato."
                    ],
                    "contact_email" => [
                        "Informe o email."
                    ],
                    "contact_phone" => [
                        "Informe o telefone para contato."
                    ]
                  ]
                ]
            );
    }

    public function testUserAddQuotationUnauthenticated()
    {
        $response = $this
        ->json(
            'POST',
            $this->url,
            []
        );
        $response
            ->assertStatus(401)
            ->assertJson(
                [
                    "message" => "Unauthenticated.",
                ]
            );
    }
}
