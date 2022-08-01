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
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Log in')
            ->assertSee('admin@trapa.com')
            ->assertSee('editor@trapa.com')
            ->assertSee('usuario@trapa.com');
        });
    }

    /**
     * Test dashboard whith admin role.
     *
     * @return void
     */
    public function testAdminRoleDashboard()
    {
        session()->flush();
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            // Admin role tests
            $browser
                ->visit('/login')
                ->type('email', 'admin@trapa.com')
                ->type('password', 'secret')
                ->press('LOG IN')
                ->assertDontSee('Whoops!')
                ->assertPathIs('/dashboard')
                ->assertSee('NEW')
                ->assertSee('VIEW')
                ->assertSee('EDIT')
                ->assertSee('DELETE')
                ->logout();
        });
    }

    /**
     * Test dashboard whith editor role.
     *
     * @return void
     */
    public function testEditorRoleDashboard()
    {
        $this->artisan('migrate:fresh --seed');
        session()->flush();

        $this->browse(function (Browser $browser) {
            // Editor role tests
            $browser->driver->manage()->deleteAllCookies();
            $browser
                ->visit('/login')
                ->type('email', 'editor@trapa.com')
                ->type('password', 'secret')
                ->press('LOG IN')
                ->assertDontSee('Whoops!')
                ->assertPathIs('/dashboard')
                ->assertDontSee('NEW')
                ->assertSee('VIEW')
                ->assertSee('EDIT')
                ->assertDontSee('DELETE')
                ->logout();
        });
    }
    
    /**
     * Test dashboard whith usuario role.
     *
     * @return void
     */
    public function testUsuarioRoleDashboard()
    {
        session()->flush();
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            // Usuario role tests
            $browser->visit('/login')->script('location.reload();');
            $browser
                ->visit('/login')
                ->type('email', 'usuario@trapa.com')
                ->type('password', 'secret')
                ->press('LOG IN')
                ->assertDontSee('Whoops!')
                ->assertPathIs('/dashboard')
                ->assertDontSee('NEW')
                ->assertSee('VIEW')
                ->assertDontSee('EDIT')
                ->assertDontSee('DELETE')
                ->logout();
        });
    }

}
