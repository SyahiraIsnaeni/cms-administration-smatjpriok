<?php

namespace Tests\Feature;

use App\Models\Ekstrakurikuler;
use App\Services\EkstrakurikulerService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EkstrakurikulerServiceTest extends TestCase
{
    protected $ekstrakurikulerService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->ekstrakurikulerService = app(EkstrakurikulerService::class);
    }

    public function testAddEkstrakurikulerSuccess()
    {
        $data = [
            'nama' => 'Ekstrakurikuler Test',
            'logo' => 'logo.jpg',
            'deskripsi' => 'Deskripsi test',
            'images' => [
                'image1.jpg',
                'image2.jpg',
            ]
        ];

        $ekstrakurikuler = $this->ekstrakurikulerService->add($data);

        $this->assertInstanceOf(Ekstrakurikuler::class, $ekstrakurikuler);
        $this->assertEquals('Ekstrakurikuler Test', $ekstrakurikuler->nama);
        $this->assertEquals('logo.jpg', $ekstrakurikuler->logo);
        $this->assertEquals('Deskripsi test', $ekstrakurikuler->deskripsi);
        $this->assertCount(2, $ekstrakurikuler->images);

        foreach ($data['images'] as $image) {
            $this->assertDatabaseHas('ekstrakurikuler_images', ['image' => $image]);
        }
    }

    public function testAddEkstrakurikulerFailed()
    {
        $data = [
            // 'nama' => 'Ekstrakurikuler Test', // missing 'nama'
            'logo' => 'logo.jpg',
            'deskripsi' => 'Deskripsi test',
            'images' => [
                'image1.jpg',
                'image2.jpg',
            ]
        ];

        $this->expectException(\Exception::class);

        $this->ekstrakurikulerService->add($data);
    }

    public function testEditEkstrakurikulerSuccess()
    {
        $newData = [
            'nama' => 'Updated Ekstrakurikuler Name',
            'logo' => 'new_logo.jpg',
            'deskripsi' => 'Updated deskripsi',
        ];

        $updatedEkstrakurikuler = $this->ekstrakurikulerService->edit(2, $newData);

        $this->assertEquals($newData['nama'], $updatedEkstrakurikuler->nama);
        $this->assertEquals($newData['logo'], $updatedEkstrakurikuler->logo);
        $this->assertEquals($newData['deskripsi'], $updatedEkstrakurikuler->deskripsi);
    }

    public function testDeleteEkstrakurikulerSuccess()
    {
        $deleted = $this->ekstrakurikulerService->delete(2);

        $this->assertTrue($deleted);
    }

    public function testDeleteEkstrakurikulerFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->ekstrakurikulerService->delete(2);
    }

    public function testGetEkstrakurikulerSuccess()
    {
        $ekstrakurikuler = $this->ekstrakurikulerService->get();

        $this->assertInstanceOf(Ekstrakurikuler::class, $ekstrakurikuler->first());
    }

}
