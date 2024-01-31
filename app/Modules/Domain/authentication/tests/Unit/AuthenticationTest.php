<?php

namespace Selfofficename\Modules\Domain\Transaction\tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Selfofficename\Modules\Core\Traits\ConvertNumberToEnglish;
use Selfofficename\Modules\Core\Traits\ConvertNumberToPersian;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\Domain\Commission\Models\Commission;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;
use Selfofficename\Modules\InfraStructure\Models\User;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;
    use ConvertNumberToEnglish;
    use ConvertNumberToPersian;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
        $this->user = User::factory(1)->create(['password' => 123456])->first();
        $this->account = Account::factory(1)->create()->first();
        $this->card = Card::factory(1)->create()->first();
        $this->transaction = Transaction::factory(1)->create()->first();
        $this->commission = Commission::factory(1)->create()->first();
    }
}
