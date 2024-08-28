<?php

namespace Bicycle\Modules\Domain\Bicycle\Tests;

use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Tests\CreatesApplication;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected bool $seed = true;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->createApplication();

        parent::__construct($name, $data, $dataName);
    }

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('passport:install');
        $this->user = User::factory(1)->create(['password' => 123456])->first();
        $this->token = $this->user->createToken('test token')->accessToken;
        $this->bicycle = Bicycle::factory()->create();

        $this->seed();
    }

}
