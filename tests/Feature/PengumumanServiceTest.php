<?php

namespace Tests\Feature;

use App\Models\Pengumuman;
use App\Services\PengumumanService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class PengumumanServiceTest extends TestCase
{
    protected $pengumumanService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pengumumanService = app(PengumumanService::class);
    }

    public function testAddPengumumanSuccess()
    {
        $data = [
            'judul' => 'judul Test',
            'penulis' => 'penulis Test',
            'slug' => 'slug-test',
            'konten' => 'konten Test',
            'kategori_pengumuman_id' => 3,
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
            'dokumen' => UploadedFile::fake()->create('dokumen.pdf', 100),
            'is_active' => true,
        ];

        $pengumuman = $this->pengumumanService->add($data);

        $this->assertInstanceOf(Pengumuman::class, $pengumuman);
        $this->assertEquals('judul Test', $pengumuman->judul);
        $this->assertEquals('penulis Test', $pengumuman->penulis);
        $this->assertEquals('konten Test', $pengumuman->konten);

    }

    public function testAddPengumumanFailed()
    {
        $data = [
            'judul' => 'pengumuman Test',
        ];

        $this->expectException(\Exception::class);

        $this->pengumumanService->add($data);
    }

    public function testEditPengumumanSuccess()
    {
        $newData = [
            'judul' => 'judul Test update',
            'penulis' => 'penulis Test update',
            'slug' => 'slug-test-update',
            'konten' => 'konten Test update',
            'kategori_pengumuman_id' => 3,
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
            'dokumen' => UploadedFile::fake()->create('dokumen.pdf', 100),
            'is_active' => false,
        ];

        $updatedPengumuman = $this->pengumumanService->edit(1, $newData);

        $this->assertEquals($newData['judul'], $updatedPengumuman->judul);
    }

    public function testSoftDeletePrestasiSuccess()
    {
        $deleted = $this->pengumumanService->softDelete(2);

        $this->assertTrue($deleted);
    }

    public function testSoftDeletePrestasiFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->pengumumanService->softDelete(2);
    }

    public function testHardDeletePengumumanSuccess()
    {
        $deleted = $this->pengumumanService->hardDelete(2);

        $this->assertTrue($deleted);
    }

    public function testDeletePengumumanFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->pengumumanService->hardDelete(2);
    }

    public function testGetPengumumanSuccess()
    {
        $response = $this->pengumumanService->get();

        $this->assertInstanceOf(LengthAwarePaginator::class, $response);

        $this->assertEquals(0, $response->total());
    }
}
