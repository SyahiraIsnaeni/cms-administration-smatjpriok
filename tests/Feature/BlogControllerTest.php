<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class BlogControllerTest extends TestCase
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

    public function testDataBlog()
    {
        $this->get('/dashboard/beranda/blog')
            ->assertStatus(200)->assertSeeText("Data Blog");
    }

    public function testAddBlog()
    {
        $response = $this->get('/dashboard/beranda/blog/add');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.blog.add');
    }

    public function testEditBlog()
    {
        $blogId = 3;

        $response = $this->get('/dashboard/beranda/blog/' . $blogId . '/edit');

        $response->assertStatus(200)
            ->assertViewIs('back.admin.konten.beranda.blog.edit');
    }

    private function validData()
    {
        return [
            'judul' => 'judul blog',
            'penulis' => 'penulis',
            'konten' => 'konten',
            'gambar' => UploadedFile::fake()->image('blog.jpg'),
            'is_active' => 1,
        ];
    }

    public function testAddDataBlog()
    {
        $response = $this->post("/dashboard/beranda/blog/add", $this->validData());

        $response->assertRedirect("/dashboard/beranda/blog");
    }

    public function testEditDataBlog()
    {
        $blogId = 4;

        $response = $this->patch("/dashboard/beranda/blog/{$blogId}/edit", $this->validData());

        $response->assertRedirect(route('blog'));
    }

    public function testDeleteDataBlog()
    {
        $response = $this->delete('/dashboard/beranda/blog/' . 4 . '/delete');

        $response->assertRedirect('/dashboard/beranda/blog');
    }
}
