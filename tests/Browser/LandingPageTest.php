<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LandingPageTest extends DuskTestCase
{

    use RefreshDatabase;

    protected $user;

    /** @test
     * This test should check if: A guest can reach the landing page
     */
    public function a_guest_can_reach_the_landing_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage);
            $browser->assertSee('Game.Local');
        });
    }

    /** @test
    * This test should check if: a guest can create a new account
    */
    public function a_guest_can_create_a_new_account(){
        $this->browse(function (Browser $browser) {
            $u = factory(User::class)->make();

            $browser->visit(new HomePage)
                    ->tryRegister($u);
        });
    }

//    /** @test
//     * This test should check if: a guest can login with their account
//     */
//    public function a_guest_can_login_with_their_account()
//    {
//
//        $u = factory(User::class)->create();
//
//        $this->browse(function (Browser $browser) use ($u) {
//            $browser->visit(new HomePage)
//            ->tryLogin($browser, $u->name);
//        });
//    }

//    /** @test
//    * This test should check if: a guest can login
//    */
//    public function a_guest_can_login(){
//        $user = factory(User::class)->create();
//
//        $this->browse(function (Browser $browser) use ($user){
//            $browser->visit('/');
//            $browser->type('load_username', $user->name)
//                ->type('load_password', 'secret')
//                ->click('#load_submit');
//            $browser->pause(300);
//            $browser->assertTitleContains("Dashboard of gus");
//        });
//    }
}
