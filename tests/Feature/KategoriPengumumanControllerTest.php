<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class KategoriPengumumanControllerTest extends TestCase
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

    public function testDataKategoriPengumuman()
    {
        $this->get('/dashboard/kategori/kategori-pengumuman')
            ->assertStatus(200)->assertSeeText("Data Kategori Pengumuman");
    }

    public function testAddKategoriPengumuman()
    {
        $response = $this->get('/dashboard/kategori/kategori-pengumuman/add');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.kategori.kategori-pengumuman.add');
    }

    public function testEditKategoriPengumuman()
    {
        $prestasiId = 3;

        $response = $this->get('/dashboard/kategori/kategori-pengumuman/' . $prestasiId . '/edit');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.kategori.kategori-pengumuman.edit');
    }

    private function validData()
    {
        return [
            'kategori' => 'new kategori',
        ];
    }

    public function testAddDataKategoriPengumuman()
    {
        $response = $this->post("/dashboard/kategori/kategori-pengumuman/add", $this->validData());

        $response->assertRedirect("/dashboard/kategori/kategori-pengumuman");
    }


    public function testEditDataKategoriPengumuman()
    {
        $kategoriId = 6;

        $response = $this->patch("/dashboard/kategori/kategori-pengumuman/{$kategoriId}/edit", $this->validData());

        $response->assertRedirect(route('kategori-pengumuman'));
    }

    public function testDeleteDataKategoriPengumuman()
    {
        $response = $this->delete('/dashboard/kategori/kategori-pengumuman/' . 7 . '/delete');

        $response->assertRedirect('/dashboard/kategori/kategori-pengumuman');
    }
}
