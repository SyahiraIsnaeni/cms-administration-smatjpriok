<?php

namespace Tests\Feature;

use App\Services\UserService;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;
    protected function setUp():void
    {
        parent::setUp();
        DB::table('users')->truncate();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess()
    {
        $this->seed(UserSeeder::class);
        $result = $this->userService->login('admin.smatanjungpriok@gmail.com', 'adminsmatjpriok');
        $this->assertTrue($result);
        $result2 = $this->userService->login('osis.smatanjungpriok@gmail.com', 'osissmatjpriok');
        $this->assertTrue($result2);
    }

    public function testLoginUserNotFound()
    {
        $this->seed(UserSeeder::class);
        $result = $this->userService->login('smatanjungpriok@gmail.com', 'adminsmatjpriok');
        $this->assertfalse($result);
    }

    public function testLoginWrongPassword()
    {
        $this->seed(UserSeeder::class);
        $result = $this->userService->login('admin.smatanjungpriok@gmail.com', 'osissmatjpriok');
        $this->assertfalse($result);
    }
}
