<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RolesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test welcome page.
     *
     * @return void
     */
    public function testWelcome()
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Log in')
            ->assertSee('admin@trapa.com')
            ->assertSee('editor@trapa.com')
            ->assertSee('usuario@trapa.com');
        });
    }

    /**
     * Test dashboard whith different roles.
     *
     * @return void
     */
    public function testRolesDashboard()
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            // Admin role tests
            $browser->loginAs(User::where('email', 'admin@trapa.com')->first())->visit('/dashboard')
                ->assertSee('NEW')
                ->assertSee('VIEW')
                ->assertSee('EDIT')
                ->assertSee('DELETE');
            $browser->loginAs(User::where('email', 'editor@trapa.com')->first())->visit('/dashboard')
                ->assertDontSee('NEW')
                ->assertSee('VIEW')
                ->assertSee('EDIT')
                ->assertDontSee('DELETE');
            $browser->loginAs(User::where('email', 'usuario@trapa.com')->first())->visit('/dashboard')
                ->assertDontSee('NEW')
                ->assertSee('VIEW')
                ->assertDontSee('EDIT')
                ->assertDontSee('DELETE');
        });
    }
}
