<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Player;

class PlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetPlayers()
    {
        // Teszteljük, hogy lekérdezhetők-e a játékosok
        $response = $this->get('/players');

        $response->assertStatus(200);
        // Ellenőrizzük, hogy a válasz tartalmazza-e a játékosokat
        $response->assertJson(Player::all()->toArray());
    }

    public function testGetPlayer()
    {
        // Egy játékos létrehozása
        $player = Player::factory()->create();

        // Teszteljük, hogy lekérdezhető-e az adott játékos
        $response = $this->get('/players/' . $player->id);

        $response->assertStatus(200);
        // Ellenőrizzük, hogy a válasz tartalmazza-e a megfelelő játékost
        $response->assertJson($player->toArray());
    }

    public function testUpdatePlayer()
    {
        // Egy játékos létrehozása
        $player = Player::factory()->create();

        // Teszteljük, hogy frissíthető-e az adott játékos
        $response = $this->put('/players/' . $player->id, [
            'name' => 'Új név',
            // Egyéb frissítendő adatok
        ]);

        $response->assertStatus(200);
        // Ellenőrizzük, hogy a játékos adatai frissültek-e az adatbázisban
        $this->assertDatabaseHas('players', [
            'id' => $player->id,
            'name' => 'Új név',
            // Egyéb frissítendő adatok
        ]);
    }
}
