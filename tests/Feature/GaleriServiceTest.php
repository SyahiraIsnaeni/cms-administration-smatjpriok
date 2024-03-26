<?php

namespace Tests\Feature;

use App\Models\Galeri;
use App\Services\GaleriService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class GaleriServiceTest extends TestCase
{
    protected $galeriService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->galeriService = app(GaleriService::class);
    }

    public function testAddGaleriSuccess()
    {
        $data = [
            'judul' => 'judul Test',
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
            'images' => [
                UploadedFile::fake()->image('1.jpg'),
                UploadedFile::fake()->image('2.jpg'),
            ]
        ];

        $galeri = $this->galeriService->add($data);

        $this->assertInstanceOf(Galeri::class, $galeri);
        $this->assertEquals('judul Test', $galeri->judul);
        $this->assertCount(2, $galeri->images);
    }

    public function testAddGaleriFailed()
    {
        $data = [
            // 'nama' => 'Ekstrakurikuler Test', // missing 'nama'
            'judul' => '1.jpg',
        ];

        $this->expectException(\Exception::class);

        $this->galeriService->add($data);
    }

    public function testEditGaleriSuccess()
    {
        $newData = [
            'judul' => 'Updated galeri Name',
            'thumbnail' => UploadedFile::fake()->image('updated.jpg'),
        ];

        $updatedGaleri = $this->galeriService->edit(2, $newData);

        $this->assertEquals($newData['judul'], $updatedGaleri->judul);
    }

    public function testDeleteGaleriSuccess()
    {
        $deleted = $this->galeriService->delete(2);

        $this->assertTrue($deleted);
    }

    public function testDeleteGaleriFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->galeriService->delete(2);
    }

    public function testGetGaleriSuccess()
    {
        $galeri = $this->galeriService->get();

        $this->assertInstanceOf(LengthAwarePaginator::class, $galeri);
    }
}
