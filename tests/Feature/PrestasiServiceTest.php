<?php

namespace Tests\Feature;

use App\Models\Prestasi;
use App\Services\PrestasiService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class PrestasiServiceTest extends TestCase
{
    protected $prestasiService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->prestasiService = app(PrestasiService::class);
    }

    public function testAddPrestasiSuccess()
    {
        $data = [
            'nama' => 'nama Test',
            'kejuaraan' => 'kejuaraan Test',
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
            'deskripsi' => 'deskripsi test',
        ];

        $prestasi = $this->prestasiService->add($data);

        $this->assertInstanceOf(Prestasi::class, $prestasi);
        $this->assertEquals('nama Test', $prestasi->nama);
        $this->assertEquals('kejuaraan Test', $prestasi->kejuaraan);
        $this->assertEquals('deskripsi test', $prestasi->deskripsi);

    }

    public function testAddPrestasiFailed()
    {
        $data = [
            'nama' => 'Prestasi Test',
            'gambar' => 'gambar.jpg',
            'deskripsi' => 'deskripsi test',
        ];

        $this->expectException(\Exception::class);

        $this->prestasiService->add($data);
    }

    public function testEditPrestasiSuccess()
    {
        $newData = [
            'nama' => 'Updated prestasi',
            'kejuaraan' => 'Updated kejuaraan',
            'deskripsi' => 'Updated deskripsi',
            'gambar' => UploadedFile::fake()->image('updated.jpg'),
        ];

        $updatedPrestasi = $this->prestasiService->edit(1, $newData);

        $this->assertEquals($newData['nama'], $updatedPrestasi->nama);
        $this->assertEquals($newData['kejuaraan'], $updatedPrestasi->kejuaraan);
    }

    public function testDeletePrestasiSuccess()
    {
        $deleted = $this->prestasiService->delete(1);

        $this->assertTrue($deleted);
    }

    public function testDeletePrestasiFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->prestasiService->delete(2);
    }

    public function testGetPrestasiSuccess()
    {
        $response = $this->prestasiService->get();

        $this->assertInstanceOf(LengthAwarePaginator::class, $response);

        $this->assertEquals(0, $response->total());
    }
}
