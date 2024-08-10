<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmitApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_submission()
    {
        $response = $this->postJson('/api/submit', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ]);

        $response->assertStatus(202);

        $this->assertDatabaseHas('submissions', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ]);
    }
}
