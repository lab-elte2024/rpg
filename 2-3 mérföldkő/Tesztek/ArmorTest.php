<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Armor;

class ArmorTest extends TestCase
{
    use RefreshDatabase;

    public function testArmor()
    {
        $response = $this->get('/api/armor');

        $response->assertStatus(200)
            ->assertJson(Armor::all()->toArray());
    }
}
