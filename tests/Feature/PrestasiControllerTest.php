<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PrestasiControllerTest extends TestCase
{
    use DatabaseTransactions;

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

    public function testDataPrestasi()
    {
        $this->get('/dashboard/beranda/prestasi')
            ->assertStatus(200)
            ->assertSeeText("Data Prestasi");
    }

    public function testAddPrestasi()
    {
        $response = $this->get('/dashboard/beranda/prestasi/add');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.prestasi.add');
    }

    public function testEditPrestasi()
    {
        $prestasiId = 6;

        $response = $this->get('/dashboard/beranda/prestasi/' . $prestasiId . '/edit');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.prestasi.edit');
    }

    private function validData()
    {
        return [
            'nama' => 'Nama Prestasi',
            'deskripsi' => 'Deskripsi Prestasi',
            'kejuaraan' => 'Kejuaraan Prestasi',
            'gambar' => UploadedFile::fake()->image('prestasi.jpg'),
        ];
    }

    public function testAddDataPrestasi()
    {
        $response = $this->post("/dashboard/beranda/prestasi/add", $this->validData());

        $response->assertRedirect("/dashboard/beranda/prestasi");
    }


    public function testEditDataPrestasi()
    {
        $prestasiId = 7; // ID ekstrakurikuler yang akan diuji

        $response = $this->patch("/dashboard/beranda/prestasi/{$prestasiId}/edit", $this->validData());

        $response->assertRedirect(route('prestasi'));
    }

    public function testDeleteDataEkstrakurikuler()
    {
        $response = $this->delete('/dashboard/beranda/prestasi/' . 6 . '/delete');

        $response->assertRedirect('/dashboard/beranda/prestasi');
    }
}
