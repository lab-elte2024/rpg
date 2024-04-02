<?php

namespace Tests\Feature;
use App\Models\User;

 use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }
    public function testGetUsers()
    {
        // Adatbázisban létrehozunk néhány felhasználót
        User::factory()->count(3)->create();

        // Lekérdezzük a felhasználókat az /users útvonalon
        $response = $this->get('/users');

        // Ellenőrizzük, hogy a válasz státusza 200 (OK)
        $response->assertStatus(200);
        // Ellenőrizzük, hogy a válasz tartalmazza-e a felhasználókat
        $response->assertJsonCount(3);
    }
    public function testGetPostsWithUsers()
{
    $user = User::factory()->create();
    $post = $user->posts()->create([
        'title' => 'Teszt Poszt',
    ]);

    // Lekérdezzük a posztokat az /posts útvonalon
    $response = $this->get('/posts');

    // Ellenőrizzük, hogy a válasz tartalmazza-e a posztot és a felhasználót
    $response->assertJsonFragment([
        'title' => 'Teszt Poszt',
        'content' => 'Ez egy teszt poszt.',
        'user_id' => $user->id
    ]);
}

}
