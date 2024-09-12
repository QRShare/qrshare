<?php

namespace Tests\Unit;

use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index method.
     */
    public function testIndex()
    {
        Page::factory()->count(10)->create();

        User::factory()->create();
        $user = User::first();

        $response = $this->actingAs($user)->get('/api/pages');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'current_page',
                'data' => [
                    '*' => [
                        'id', 'title', 'description', 'slug', 'is_active', 'user_id', 'date', 'images', 'created_at', 'updated_at', 'deleted_at',
                    ],
                ],
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'links' => [
                    '*' => ['url', 'label', 'active'],
                ],
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total',
            ])
            ->assertJsonFragment([
                'current_page' => 1,
                'first_page_url' => 'http://qrshare.test/api/pages?page=1',
                'from' => 1,
                'last_page' => 1,
                'last_page_url' => 'http://qrshare.test/api/pages?page=1',
                'next_page_url' => null,
                'path' => 'http://qrshare.test/api/pages',
                'per_page' => 10,
                'prev_page_url' => null,
                'to' => 10,
                'total' => 10,
            ]);
    }

    /**
     * Test store method.
     */
    public function testStore()
    {
        $user = User::factory()->create();
        $pageData = [
            'title' => 'Test Page',
            'description' => 'Test Description',
            'slug' => 'test-page',
            'is_active' => true,
            'user_id' => $user->id,
            'date' => now()->toDateTimeString(),
            'images' => ['image1.jpg', 'image2.jpg'],
        ];

        $user = User::first();

        $response = $this->actingAs($user)->post('/api/pages', $pageData);

        $response->assertStatus(201)
            ->assertJsonFragment($pageData);
    }

    /**
     * Test show method.
     */
    public function testShow()
    {
        User::factory()->create();
        $page = Page::factory()->create();
        $user = User::first();

        $response = $this->actingAs($user)->get("/api/pages/{$page->id}");

        $response->assertStatus(200)
            ->assertJson($page->toArray());
    }

    /**
     * Test update method.
     */
    public function testUpdate()
    {
        User::factory()->create();
        $user = User::first();
        $page = Page::factory()->create();
        $updatedData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'slug' => 'updated-title',
            'is_active' => false,
            'user_id' => $page->user_id,
            'date' => now()->toDateTimeString(),
            'images' => ['updated_image1.jpg', 'updated_image2.jpg'],
        ];

        $response = $this->actingAs($user)->put("/api/pages/{$page->id}", $updatedData);

        $response->assertStatus(200)
            ->assertJsonFragment($updatedData);
    }

    /**
     * Test destroy method.
     */
    public function testDestroy()
    {
        User::factory()->create();
        $user = User::first();
        $page = Page::factory()->create();

        $response = $this->actingAs($user)->delete("/api/pages/{$page->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('pages', ['id' => $page->id]);
    }
}
