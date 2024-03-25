<?php

namespace Tests\Feature;

use App\Models\KritikSaran;
use App\Services\KritikSaranService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class KritikSaranServiceTest extends TestCase
{
    protected $kritikSaranService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->kritikSaranService = app(KritikSaranService::class);
    }

    public function testAddKritikSaranSuccess()
    {
        $data = [
            'nama' => 'nama Test',
            'email' => 'email Test',
            'isi' => 'isi Test',
        ];

        $kritikSaran = $this->kritikSaranService->add($data);

        $this->assertInstanceOf(KritikSaran::class, $kritikSaran);
        $this->assertEquals('nama Test', $kritikSaran->nama);
        $this->assertEquals('email Test', $kritikSaran->email);
        $this->assertEquals('isi Test', $kritikSaran->isi);

    }

    public function testAddKritikSaranFailed()
    {
        $data = [
            'nama' => 'nama Test',
        ];

        $this->expectException(\Exception::class);

        $this->kritikSaranService->add($data);
    }

    public function testDeleteKritikSaranSuccess()
    {
        $deleted = $this->kritikSaranService->delete(2);

        $this->assertTrue($deleted);
    }

    public function testDeleteKritikSaranFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->kritikSaranService->delete(2);
    }

    public function testGetKritikSaranSuccess()
    {
        $response = $this->kritikSaranService->get();

        $this->assertInstanceOf(LengthAwarePaginator::class, $response);

        $this->assertEquals(1, $response->total());
    }
}
