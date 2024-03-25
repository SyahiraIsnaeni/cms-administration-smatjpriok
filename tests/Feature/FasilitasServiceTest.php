<?php

namespace Tests\Feature;

use App\Models\Fasilitas;
use App\Services\FasilitasService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class FasilitasServiceTest extends TestCase
{
    protected $fasilitasService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fasilitasService = app(FasilitasService::class);
    }

    public function testAddFasilitasSuccess()
    {
        $data = [
            'nama' => 'fasilitas Test',
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
        ];

        $fasilitas= $this->fasilitasService->add($data);

        $this->assertInstanceOf(Fasilitas::class, $fasilitas);
        $this->assertEquals('fasilitas Test', $fasilitas->nama);

    }

    public function testAddFasilitasFailed()
    {
        $data = [
            'nama' => 'fasilitas Test',
        ];

        $this->expectException(\Exception::class);

        $this->fasilitasService->add($data);
    }

    public function testEditFasilitasSuccess()
    {
        $newData = [
            'nama' => 'fasilitas Test update',
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
        ];

        $updatedBlog = $this->fasilitasService->edit(1, $newData);

        $this->assertEquals($newData['nama'], $updatedBlog->nama);
    }

    public function testDeleteFasilitasSuccess()
    {
        $deleted = $this->fasilitasService->delete(2);

        $this->assertTrue($deleted);
    }

    public function testDeleteFasilitasFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->fasilitasService->delete(2);
    }

    public function testGetFasilitasSuccess()
    {
        $response = $this->fasilitasService->get();

        $this->assertInstanceOf(LengthAwarePaginator::class, $response);

        $this->assertEquals(1, $response->total());
    }
}
