<?php
namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testUsersList()
    {
        $response = $this->actingAs($this->adminUser)->get('/api/users');
        $response->assertStatus(200);
        $response->assertJsonStructure(['data', 'links', 'meta']);
    }

    public function testUserCreate()
    {
        $admin = User::factory()->create(['position' => '1']);
        $token = auth()->login($admin);
    
        $response = $this->withHeader('Authorization', "Bearer $token")
            ->postJson('/api/user', [
                'name' => 'New user',
                'email' => 'user@example.com',
                'password' => 'password123',
                'cpf' => '12345678909',
            ]);
    
        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'New User']);
    
        $this->assertDatabaseHas('users', ['email' => 'user@example.com']);
    }

    public function testPointList()
    {
        $admin = User::factory()->create(['position' => '1']);
        $user = User::factory()->create(['supervisor_id' => $admin->id]);
        PontoRegistro::factory()->create(['user_id' => $user->id]);

        $token = auth()->login($admin);

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->getJson('/api/pontos');

        $response->assertStatus(200)
            ->assertJsonStructure([['id', 'user_id', 'registered_at']]);
    }

    public function testUnauthenticated()
    {
        $response = $this->postJson('/api/pointresgister');

        $response->assertStatus(401);
    }


}