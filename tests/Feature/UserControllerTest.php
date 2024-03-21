<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\UserService;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        DB::table('users')->truncate();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testViewLogin()
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertSeeText("Login Admin SMA Tanjung Priok");
    }

    public function testLoginSuccessAdmin()
    {
        $this->seed(UserSeeder::class);

        $response = $this->post("/login", [
            'email' => 'admin.smatanjungpriok@gmail.com',
            'password' => 'adminsmatjpriok',
        ]);

        $response->assertStatus(302)->assertRedirect("/dashboard/admin");
        $this->assertAuthenticatedAs(User::where('email', 'admin.smatanjungpriok@gmail.com')->first());
    }

    public function testLoginSuccessOsis()
    {
        $this->seed(UserSeeder::class);

        $response = $this->post("/login", [
            'email' => 'osis.smatanjungpriok@gmail.com',
            'password' => 'osissmatjpriok',
        ]);

        $response->assertStatus(302)->assertRedirect("/dashboard/osis");
        $this->assertAuthenticatedAs(User::where('email', 'osis.smatanjungpriok@gmail.com')->first());
    }

    public function testLoginBlank()
    {
        $this->seed(UserSeeder::class);

        $response = $this->post("/login", [
            'email' => '',
            'password' => '',
        ]);

        $response->assertStatus(200)->assertSeeText("Email or password is required!");
    }

    public function testLoginFailed()
    {
        $this->seed(UserSeeder::class);

        $response = $this->post("/login", [
            'email' => 'osis.smatanjungpriok@gmail.com',
            'password' => 'osis',
        ]);

        $response->assertStatus(200)->assertSeeText("Email or password is wrong!");
    }
}
