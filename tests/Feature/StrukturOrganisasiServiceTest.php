<?php

namespace Tests\Feature;

use App\Models\Prestasi;
use App\Models\StrukturOrganisasi;
use App\Services\PrestasiService;
use App\Services\StrukturOrganisasiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class StrukturOrganisasiServiceTest extends TestCase
{
    protected $strukturOrganisasiService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->strukturOrganisasiService = app(StrukturOrganisasiService::class);
    }

    public function testAddStrukturOrganisasiSuccess()
    {
        $data = [
            'kepsek' => 'nama Test',
            'wakil_kurikulum' => 'nama Test',
            'wakil_kesiswaan' => 'nama Test',
            'wakil_sarpras' => 'nama Test',
            'bk' => 'nama Test',
            'osis' => 'nama Test',
        ];

        $struktur = $this->strukturOrganisasiService->add($data);

        $this->assertInstanceOf(StrukturOrganisasi::class, $struktur);
        $this->assertEquals('nama Test', $struktur->kepsek);

    }

    public function testAddStrukturOrganisasiFailed()
    {
        $data = [
            'kepsek' => 'nama Test',
        ];

        $this->expectException(\Exception::class);

        $this->strukturOrganisasiService->add($data);
    }

    public function testEditStrukturOrganisasiSuccess()
    {
        $newData = [
            'kepsek' => 'nama Test',
            'wakil_kurikulum' => 'nama Test',
            'wakil_kesiswaan' => 'nama Test',
            'wakil_sarpras' => 'nama Test',
            'bk' => 'nama Test',
            'osis' => 'nama Test',
        ];

        $updatedStruktur = $this->strukturOrganisasiService->edit(1, $newData);

        $this->assertEquals($newData['kepsek'], $updatedStruktur->kepsek);
    }

    public function testDeleteStrukturOrganisasiSuccess()
    {
        $deleted = $this->strukturOrganisasiService->delete(1);

        $this->assertTrue($deleted);
    }

    public function testDeleteStrukturOrganisasiFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->strukturOrganisasiService->delete(2);
    }

    public function testGetStrukturOrganisasiSuccess()
    {
        $response = $this->strukturOrganisasiService->get();

        $this->assertInstanceOf(Collection::class, $response);
    }
}
