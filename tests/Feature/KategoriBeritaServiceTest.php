<?php

namespace Tests\Feature;

use App\Models\KategoriBerita;
use App\Services\KategoriBeritaService;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;

class KategoriBeritaServiceTest extends TestCase
{
    protected $kategoriBeritaService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->kategoriBeritaService = app(KategoriBeritaService::class);
    }

    public function testAddKategoriBeritaSuccess()
    {
        $data = [
            'kategori' => 'kategori Test',
            'slug' => 'kategori-test',
        ];

        $kategori = $this->kategoriBeritaService->add($data);

        $this->assertInstanceOf(KategoriBerita::class, $kategori);
        $this->assertEquals('kategori Test', $kategori->kategori);

    }

    public function testAddKategoriBeritaFailed()
    {
        $data = [
            'kategori' => 'kategori Test 2',
        ];

        $this->expectException(\Exception::class);

        $this->kategoriBeritaService->add($data);
    }

    public function testEditKategoriBeritaSuccess()
    {
        $newData = [
            'kategori' => 'Updated kategori',
            'slug' => 'updated-kategori',
        ];

        $updatedKategori = $this->kategoriBeritaService->edit(1, $newData);

        $this->assertEquals($newData['kategori'], $updatedKategori->kategori);
        $this->assertEquals($newData['slug'], $updatedKategori->slug);
    }

    public function testDeleteKategoriBeritaSuccess()
    {
        $deleted = $this->kategoriBeritaService->delete(1);

        $this->assertTrue($deleted);
    }

    public function testDeleteKategoriBeritaFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->kategoriBeritaService->delete(2);
    }

    public function testGetKategoriBeritaSuccess()
    {
        $response = $this->kategoriBeritaService->get();

        $this->assertInstanceOf(Collection::class, $response);
    }
}
