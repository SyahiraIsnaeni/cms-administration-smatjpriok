<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class FasilitasControllerTest extends TestCase
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

    public function testDataFasilitas()
    {
        $this->get('/dashboard/profil/fasilitas')
            ->assertStatus(200)->assertSeeText("Data Fasilitas");
    }

    public function testAddFasilitas()
    {
        $response = $this->get('/dashboard/profil/fasilitas/add');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.profil.fasilitas.add');
    }

    public function testEditFasilitas()
    {
        $fasilitasId = 4;

        $response = $this->get('/dashboard/profil/fasilitas/' . $fasilitasId . '/edit');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.profil.fasilitas.edit');
    }

    private function validData()
    {
        return [
            'nama' => 'fasilitas',
            'gambar' => UploadedFile::fake()->image('blog.jpg'),
        ];
    }

    public function testAddDataFasilitas()
    {
        $response = $this->post("/dashboard/profil/fasilitas/add", $this->validData());

        $response->assertRedirect("/dashboard/profil/fasilitas");
    }

    public function testEditDataFasilitas()
    {
        $fasilitasId = 5;

        $response = $this->patch("/dashboard/profil/fasilitas/{$fasilitasId}/edit", $this->validData());

        $response->assertRedirect(route('fasilitas'));
    }

    public function testDeleteDataFasilitas()
    {
        $response = $this->delete('/dashboard/profil/fasilitas/' . 5 . '/delete');

        $response->assertRedirect('/dashboard/profil/fasilitas');
    }
}
