<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class BeritaControllerTest extends TestCase
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

    public function testDataBerita()
    {
        $this->get('/dashboard/beranda/berita')
            ->assertStatus(200)->assertSeeText("Data Berita");
    }

    public function testAddBerita()
    {
        $response = $this->get('/dashboard/beranda/berita/add');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.berita.add');
    }

    public function testEditBerita()
    {
        $beritaId = 4;

        $response = $this->get('/dashboard/beranda/berita/' . $beritaId . '/edit');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.berita.edit');
    }

    private function validData()
    {
        return [
            'judul' => 'judul berita',
            'penulis' => 'penulis',
            'konten' => 'konten',
            'kategori_berita_id' => '2',
            'gambar' => UploadedFile::fake()->image('berita.jpg'),
            'is_active' => 1,
        ];
    }

    public function testAddDataBerita()
    {
        $response = $this->post("/dashboard/beranda/berita/add", $this->validData());

        $response->assertRedirect("/dashboard/beranda/berita");
    }

    public function testEditDataBerita()
    {
        $beritaId = 5;

        $response = $this->patch("/dashboard/beranda/berita/{$beritaId}/edit", $this->validData());

        $response->assertRedirect(route('berita'));
    }

    public function testDeleteDataBerita()
    {
        $response = $this->delete('/dashboard/beranda/berita/' . 5 . '/delete');

        $response->assertRedirect('/dashboard/beranda/berita');
    }
}
