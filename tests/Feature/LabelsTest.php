<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LabelsTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Label $label;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->label = Label::factory()->create();
    }

    public function testLabelsPage(): void
    {
        $response = $this->actingAs($this->user)
            ->withSession(['banned' => false])
            ->get(route('labels.index'));

        $response->assertOk();
    }

    public function testCreateStorePage(): void
    {
        $label = ['name' => 'name', 'description' => 'description'];

        $response = $this->actingAs($this->user)
            ->withSession(['banned' => false])
            ->post(route('labels.store', $label));

        $response->assertRedirect('/labels');

        $this->assertDatabaseHas('labels', $label);

    }

    public function testCreateStorePageWithoutAuthorized(): void
    {
        $label = ['name' => 'name', 'description' => 'description'];
        $response = $this->post(route('labels.store', $label));

        $response->assertRedirect('/labels');

        $this->assertDatabaseMissing('labels', $label);

    }

    public function testEditLabelsPage(): void
    {
        $response = $this->actingAs($this->user)
                        ->withSession(['banned' => false])
                        ->get(route('labels.edit', $this->label));

        $response->assertOk();
    }

    public function testUpdatePost(): void
    {
        $label = ['name' => 'newName', 'description' => 'newDescription'];
        $response = $this->actingAs($this->user)
            ->withSession(['banned' => false])
            ->put(route('labels.update', $this->label), $label);

        $response->assertRedirect('/labels');

        $this->assertDatabaseHas('labels', $label);
    }

    public function testUpdatePostWithoutAuthorized(): void
    {
        $newLabel = ['name' => 'newName', 'description' => 'newDescription'];

        $response = $this->put(route('labels.update', $this->label), $newLabel);

        $response->assertRedirect('/labels');

        $this->assertDatabaseMissing('labels', $newLabel);
    }

    public function testDeletePost(): void
    {
        $response = $this->actingAs($this->user)
            ->withSession(['banned' => false])
            ->delete(route('labels.destroy', $this->label));

        $response->assertRedirect();

        $this->assertDatabaseMissing('labels', $this->label->only(['name', 'description']));
    }

    public function testCreatePostUnauthorized(): void
    {
        $response = $this->get(route('labels.create'));

        $response->assertStatus(403);
    }

}
