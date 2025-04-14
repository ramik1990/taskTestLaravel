<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskPriorityTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_priority_returns_sorted_tasks()
    {
        Task::factory()->create([
            'importance' => 5,
            'deadline' => now()->addDays(1),
        ]);

        Task::factory()->create([
            'importance' => 2,
            'deadline' => now()->addDays(10),
        ]);

        $response = $this->getJson('/api/tasks/priority');
        $response->assertStatus(200);
        $data = $response->json('data');

        $this->assertTrue($data[0]['priority_score'] >= $data[1]['priority_score']);
    }
}
