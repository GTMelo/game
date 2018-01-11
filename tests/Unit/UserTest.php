<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    protected $user;

    protected function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'LaratrustSeeder']);
        $this->user = factory(User::class)->make();

    }

    /** @test */
    public function an_user_can_be_created(){
        $u = User::gen($this->user->name, $this->user->email, $this->user->password);
//        $u = factory(User::class)->create();
        $this->assertNotEmpty(User::find($u->id));
    }

    public function an_user_be_edited(){
        $this->user->name = "test";
        $this->save();
        $this->assertEquals("test", User::find($this->user->id));
    }

    /** @test */
    public function an_user_can_be_deleted(){
        $u = User::gen('deleted', $this->user->email, $this->user->password);
        $this->assertEquals('deleted', User::where('name', 'deleted')->first()->name);
        $u->delete();
        $this->assertEmpty(User::where('name', 'deleted')->first());
    }

    /** @test */
    public function an_user_has_a_role(){
        $u = User::gen($this->user->name, $this->user->email, $this->user->password);
        self::assertTrue($u->hasRole('user'));
    }

}
