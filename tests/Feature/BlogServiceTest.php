<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class BlogServiceTest extends TestCase
{
    protected $blogService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->blogService = app(BlogService::class);
    }

    public function testAddBlogSuccess()
    {
        $data = [
            'judul' => 'judul Test',
            'penulis' => 'penulis Test',
            'slug' => 'slug-test',
            'konten' => 'konten Test',
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
            'is_active' => true,
        ];

        $blog= $this->blogService->add($data);

        $this->assertInstanceOf(Blog::class, $blog);
        $this->assertEquals('judul Test', $blog->judul);
        $this->assertEquals('penulis Test', $blog->penulis);
        $this->assertEquals('konten Test', $blog->konten);

    }

    public function testAddBlogFailed()
    {
        $data = [
            'judul' => 'berita Test',
        ];

        $this->expectException(\Exception::class);

        $this->blogService->add($data);
    }

    public function testEditBlogSuccess()
    {
        $newData = [
            'judul' => 'judul Test update',
            'penulis' => 'penulis Test update',
            'slug' => 'slug-test-update',
            'konten' => 'konten Test update',
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
            'is_active' => false,
        ];

        $updatedBlog = $this->blogService->edit(1, $newData);

        $this->assertEquals($newData['judul'], $updatedBlog->judul);
    }

    public function testSoftDeleteBlogSuccess()
    {
        $deleted = $this->blogService->softDelete(2);

        $this->assertTrue($deleted);
    }

    public function testSoftDeleteBlogFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->blogService->softDelete(2);
    }

    public function testHardDeleteBlogSuccess()
    {
        $deleted = $this->blogService->hardDelete(2);

        $this->assertTrue($deleted);
    }

    public function testDeleteBlogFailed()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->blogService->hardDelete(2);
    }

    public function testGetBlogSuccess()
    {
        $response = $this->blogService->get();

        $this->assertInstanceOf(LengthAwarePaginator::class, $response);

        $this->assertEquals(0, $response->total());
    }
}
