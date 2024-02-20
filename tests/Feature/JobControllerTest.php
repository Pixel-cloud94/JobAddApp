<?php

namespace Tests\Feature;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class JobControllerTest extends TestCase
{
    /**
     * Test index method.
     *
     * @return void
     */
    public function testIndex()
    {
        // Create an admin user
        $user = User::factory()->create(['isAdmin' => true]);

        // Simulate an authenticated request
        $response = $this->actingAs($user)->get('/jobs');

        // Assert that the response is successful
        $response->assertStatus(200);
    }

    
}
