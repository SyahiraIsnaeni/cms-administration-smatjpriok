<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PengumumanControllerTest extends TestCase
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

    public function testDataPengumuman()
    {
        $this->get('/dashboard/beranda/pengumuman')
            ->assertStatus(200)->assertSeeText("Data Pengumuman");
    }

    public function testAddPengumuman()
    {
        $response = $this->get('/dashboard/beranda/pengumuman/add');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.pengumuman.add');
    }

    public function testEditPengumuman()
    {
        $pengumumanId = 3;

        $response = $this->get('/dashboard/beranda/pengumuman/' . $pengumumanId . '/edit');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.pengumuman.edit');
    }

    private function validData()
    {
        return [
            'judul' => 'judul pengumuman',
            'penulis' => 'penulis',
            'konten' => 'konten',
            'kategori_pengumuman_id' => '3',
            'gambar' => UploadedFile::fake()->image('pengumuman.jpg'),
            'dokumen' => UploadedFile::fake()->create('dokumen.pdf', 100),
            'is_active' => 1,
        ];
    }

    public function testAddDataPengumuman()
    {
        $response = $this->post("/dashboard/beranda/pengumuman/add", $this->validData());

        $response->assertRedirect("/dashboard/beranda/pengumuman");
    }

    public function testEditDataPengumuman()
    {
        $pengumumanId = 5;

        $response = $this->patch("/dashboard/beranda/pengumuman/{$pengumumanId}/edit", $this->validData());

        $response->assertRedirect(route('pengumuman'));
    }

    public function testDeleteDataKategoriPengumuman()
    {
        $response = $this->delete('/dashboard/beranda/pengumuman/' . 5 . '/delete');

        $response->assertRedirect('/dashboard/beranda/pengumuman');
    }
}
