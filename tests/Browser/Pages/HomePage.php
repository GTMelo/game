<?php

namespace Tests\Browser\Pages;

use App\Models\User;
use Laravel\Dusk\Browser;

class HomePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@newname' => '#new_name',
            '@newpass' => '#new_password',
            '@newpassconf' => '#new_password_confirmation',
            '@newemail' => '#new_email',
            '@loadname' => '#load_name',
            '@loadpass' => '#load_password',
            '@new_submit' => '#new_submit',
            '@load_submit' => '#load_submit',
        ];
    }

    public function tryRegister(Browser $browser, $user){

        $browser->type('@newname', $user->name)
            ->type('@newpass', $user->password)
            ->type('@newpassconf', $user->password)
            ->type('@newemail', $user->email)
            ->press('@new_submit')
            ->on(new Dashboard)
            ->assertSee('dash');
    }

    public function tryLogin(Browser $browser, $username){
        $browser->type('@loadname', $username)
            ->type('@loadpass', 'secret')
            ->press('@load_submit')
            ->assertSee('Dashboard');
    }
}
