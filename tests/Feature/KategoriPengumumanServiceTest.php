<?php

namespace Tests\Feature;

use App\Models\KategoriPengumuman;
use App\Services\KategoriPengumumanService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class KategoriPengumumanServiceTest extends TestCase
{
    protected $kategoriPengumumanService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->kategoriPengumumanService = app(KategoriPengumumanService::class);
    }

    public function testAddKategoriPengumumanSuccess()
    {
        $data = [
            'kategori' => 'kategori Test',
            'slug' => 'kategori-test',
        ];

        $kategori = $this->kategoriPengumumanService->add($data);

        $this->assertInstanceOf(KategoriPengumuman::class, $kategori);
        $this->assertEquals('kategori Test', $kategori->kategori);

    }

    public function testAddKategoriPengumumanFailed()
    {
        $data = [
            'kategori' => 'kategori Test 2',
        ];

        $this->expectException(\Exception::class);

        $this->kategoriPengumumanService->add($data);
    }

    public function testEditKategoriPengumumanSuccess()
    {
        $newData = [
            'kategori' => 'Updated kategori',
            'slug' => 'updated-kategori',
        ];

        $updatedKategori = $this->kategoriPengumumanService->edit(1, $newData);

        $this->assertEquals($newData['kategori'], $updatedKategori->kategori);
        $this->assertEquals($newData['slug'], $updatedKategori->slug);
    }

    public function testDeleteKategoriPengumumanSuccess()
    {
        $deleted = $this->kategoriPengumumanService->delete(1);

        $this->assertTrue($deleted);
    }

    public function testDeleteKategoriPengumumanFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->kategoriPengumumanService->delete(2);
    }

    public function testGetKategoriPengumumanSuccess()
    {
        $response = $this->kategoriPengumumanService->get();

        $this->assertInstanceOf(Collection::class, $response);
    }
}
