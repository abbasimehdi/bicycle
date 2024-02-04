<?php

namespace Bicycle\Modules\Domain\Authentication\Tests\Feature;

use App\Models\User;
use Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
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
                AuthConstants::NAME     => fake()->name,
                AuthConstants::EMAIL    => fake()->unique()->email,
                AuthConstants::USERNAME => fake()->unique()->realTextBetween(4, 16),
                AuthConstants::PASSWORD => fake()->numberBetween(111111, 999999),
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
                    AuthConstants::EMAIL    => $this->user->email,
                    AuthConstants::PASSWORD => $this->password,
                ]
            );

        $response->assertStatus(ResponseAlias::HTTP_OK);
    }
}
