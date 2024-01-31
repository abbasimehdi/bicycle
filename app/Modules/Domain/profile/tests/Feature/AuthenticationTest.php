<?php

namespace Selfofficename\Modules\Domain\Transaction\tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\InfraStructure\Models\User;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
        $this->password = "123456";
        $this->user = User::factory(1)->create(['password' => $this->password])->first();
        $this->token = $this->user->createToken('test token')->accessToken;
    }

    /**
     * @test
     */
    public function register_and_create_token(): void
    {
        $response = $this->withHeader('Accept', "application/json")
            ->json('POST', "/api/auth/register" ,
            [
                'name'      => fake()->name,
                'email'      => fake()->unique()->email,
                'mobile'      => "09". mt_rand(111111111, 999999999),
                'password'      => fake()->numberBetween(111111, 999999),
            ]
        );

        $response->assertStatus(ResponseAlias::HTTP_CREATED);
    }

    /**
     * @test
     */
    public function login(): void
    {
        $response = $this->withHeader('Accept', "application/json")
            ->json('POST', "/api/auth/login" ,
                [
                    'email'      => $this->user->email,
                    'password'      => $this->password,
                ]
            );

        $response->assertStatus(ResponseAlias::HTTP_OK);
    }
}
