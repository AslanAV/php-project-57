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
            ->get(route('labels.edit', $this->label));

        $response = $this->get(route('labels.index'));

        $response->assertOk();
    }

    public function testCreateStorePage(): void
    {
        $label = $this->label->only(['name', 'description']);
        $response = $this->actingAs($this->user)
            ->withSession(['banned' => false])
            ->post(route('labels.store', $label));

        $response->assertRedirect();

        $this->assertDatabaseHas('labels', $label);

    }

    public function testCreateStorePageWithoutAutorized(): void
    {
        $label = $this->label->only(['name', 'description']);
        $response = $this->post(route('labels.store', $label));

        $response->assertRedirect();

        $this->assertDatabaseHas('labels', $label);

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
        $response = $this->actingAs($this->user)
            ->withSession(['banned' => false])
            ->put(route('labels.update', $this->label));

        $response->assertRedirect();

        $this->assertDatabaseHas('labels', $this->label->only(['name', 'description']));
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

        $response->assertRedirect();
    }

}
