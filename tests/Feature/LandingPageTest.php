<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LandingPageTest extends TestCase
{
    /** @test
    * This test should check if a guest can see the landing page
    */
    public function check_if_a_guest_can_see_the_landing_page(){
        $r = $this->get('/');
        $r->assertStatus(200);
    }

    /** @test
    * This test should check if: a guest can see the login form
    */
    public function a_guest_can_see_the_login_form(){
        $r = $this->get('/');
        $this->assertGuest();
        $r->assertSee('Load Game');
    }
}
