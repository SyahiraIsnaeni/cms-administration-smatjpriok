<?php

namespace Tests\Feature;

use App\Models\Berita;
use App\Services\BeritaService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class BeritaServiceTest extends TestCase
{
    protected $beritaService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->beritaService = app(BeritaService::class);
    }

    public function testAddBeritaSuccess()
    {
        $data = [
            'judul' => 'judul Test',
            'penulis' => 'penulis Test',
            'slug' => 'slug-test',
            'konten' => 'konten Test',
            'kategori_berita_id' => 2,
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
            'is_active' => true,
        ];

        $berita= $this->beritaService->add($data);

        $this->assertInstanceOf(Berita::class, $berita);
        $this->assertEquals('judul Test', $berita->judul);
        $this->assertEquals('penulis Test', $berita->penulis);
        $this->assertEquals('konten Test', $berita->konten);

    }

    public function testAddBeritaFailed()
    {
        $data = [
            'judul' => 'berita Test',
        ];

        $this->expectException(\Exception::class);

        $this->beritaService->add($data);
    }

    public function testEditBeritaSuccess()
    {
        $newData = [
            'judul' => 'judul Test update',
            'penulis' => 'penulis Test update',
            'slug' => 'slug-test-update',
            'konten' => 'konten Test update',
            'kategori_berita_id' => 2,
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
            'is_active' => false,
        ];

        $updatedBerita = $this->beritaService->edit(1, $newData);

        $this->assertEquals($newData['judul'], $updatedBerita->judul);
    }

    public function testSoftDeleteBeritaSuccess()
    {
        $deleted = $this->beritaService->softDelete(2);

        $this->assertTrue($deleted);
    }

    public function testSoftDeleteBeritaFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->beritaService->softDelete(2);
    }

    public function testHardDeleteBeritaSuccess()
    {
        $deleted = $this->beritaService->hardDelete(1);

        $this->assertTrue($deleted);
    }

    public function testDeleteBeritaFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->beritaService->hardDelete(2);
    }

    public function testGetBeritaSuccess()
    {
        $response = $this->beritaService->get();

        $this->assertInstanceOf(LengthAwarePaginator::class, $response);

        $this->assertEquals(0, $response->total());
    }
}
