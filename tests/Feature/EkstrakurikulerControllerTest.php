<?php

namespace Tests\Feature;

use App\Models\Ekstrakurikuler;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EkstrakurikulerControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        DB::table('users')->truncate();
        $this->seed(UserSeeder::class);
        $this->post("/login", [
            'email' => 'admin.smatanjungpriok@gmail.com',
            'password' => 'adminsmatjpriok',
        ]);
    }

    public function testDataEkstrakurikuler()
    {
        $this->get('/dashboard/beranda/ekstrakurikuler')
            ->assertStatus(200)
            ->assertSeeText("Data Ektrakurikuler");
    }

    public function testAddEkstrakurikuler()
    {
        $response = $this->get('/dashboard/beranda/ekstrakurikuler/add');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.ekstrakurikuler.add');
    }

    public function testEditEkstrakurikuler()
    {
        $ekstrakurikulerId = 26;

        $response = $this->get('/dashboard/beranda/ekstrakurikuler/' . $ekstrakurikulerId . '/edit');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.ekstrakurikuler.edit');
    }

    private function validData()
    {
        return [
            'nama' => 'Nama Ekstrakurikuler',
            'deskripsi' => 'Deskripsi Ekstrakurikuler',
            'logo' => UploadedFile::fake()->image('logo.jpg'),
            'images' => [UploadedFile::fake()->image('image1.jpg'), UploadedFile::fake()->image('image2.jpg')],
        ];
    }

    public function testAddDataEkstrakurikuler()
    {
        $response = $this->post("/dashboard/beranda/ekstrakurikuler/add", $this->validData());

        $response->assertRedirect("/dashboard/beranda/ekstrakurikuler");
    }


    public function testEditDataEkstrakurikuler()
    {
        $ekstrakurikulerId = 29; // ID ekstrakurikuler yang akan diuji
        $updatedName = 'Basket';
        $updatedDeskripsi = 'Basket Update';
        $updatedLogo = UploadedFile::fake()->image('new_logo.jpg');
        $updatedImages = [
            UploadedFile::fake()->image('new_image1.jpg'),
            UploadedFile::fake()->image('new_image2.jpg')
        ];

        $response = $this->patch("/dashboard/beranda/ekstrakurikuler/{$ekstrakurikulerId}/edit", [
            'nama' => $updatedName,
            'deskripsi' => $updatedDeskripsi,
            'logo' => $updatedLogo,
            'images' => $updatedImages,
        ]);

        $response->assertRedirect(route('ekstrakurikuler'));

        $this->assertDatabaseHas('ekstrakurikulers', [
            'id' => $ekstrakurikulerId,
            'nama' => $updatedName,
            'deskripsi' => $updatedDeskripsi,
        ]);
    }

    public function testDeleteDataEkstrakurikuler()
    {
        $response = $this->delete('/dashboard/beranda/ekstrakurikuler/' . 35 . '/delete');

        $response->assertRedirect('/dashboard/beranda/ekstrakurikuler');
    }
}
