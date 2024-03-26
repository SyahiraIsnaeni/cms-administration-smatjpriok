<?php

namespace Tests\Feature;

use App\Models\Welcome;
use App\Services\WelcomeService;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class WelcomeServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::table('users')->truncate();
        $this->seed(UserSeeder::class);
        $this->post("/login", [
            'email' => 'admin.smatanjungpriok@gmail.com',
            'password' => 'adminsmatjpriok',
        ]);
    }

    public function testDataWelcome()
    {
        $this->get('/dashboard/beranda/welcome')
            ->assertStatus(200)->assertSeeText("Data Welcome Popup");
    }

    public function testAddWelcome()
    {
        $response = $this->get('/dashboard/beranda/welcome/add');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.welcome-popup.add');
    }

    private function validData()
    {
        return [
            'gambar' => UploadedFile::fake()->image('welcome.jpg'),
        ];
    }

    public function testAddDataWelcome()
    {
        $response = $this->post("/dashboard/beranda/welcome/add", $this->validData());

        $response->assertRedirect("/dashboard/beranda/welcome");
    }

    public function testDeleteDataWelcome()
    {
        $response = $this->delete('/dashboard/beranda/welcome/' . 3 . '/delete');

        $response->assertRedirect('/dashboard/beranda/welcome');
    }
}
