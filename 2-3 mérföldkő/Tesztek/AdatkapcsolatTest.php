<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Armor;
use App\Models\Classes;
use App\Models\Player;
use App\Models\Skills;
use App\Models\Weapon;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function testArmorAndClassRelationship()
    {
        // Tesztadatok létrehozása
        $armor = Armor::factory()->create(['classID' => 1]); // Példa adatok a Swordman osztályhoz
        $class = Classes::find(1); // Swordman osztály lekérése

        // Ellenőrizzük, hogy az Armor modellhez tartozó osztály egyezik-e a várt osztállyal
        $this->assertEquals($class->name, $armor->class->name);
    }

    public function testPlayerSkills()
    {
        // Tesztadatok létrehozása
        $player = Player::factory()->create();
        $skill1 = Skills::factory()->create(['classID' => $player->classID]);
        $skill2 = Skills::factory()->create(['classID' => $player->classID]);
        $skill3 = Skills::factory()->create(['classID' => $player->classID]);
        $player->skill1_ID = $skill1->ID;
        $player->skill2_ID = $skill2->ID;
        $player->skill3_ID = $skill3->ID;
        $player->save();

        // Ellenőrizzük, hogy a játékoshoz rendelt képességek a megfelelő osztályhoz tartoznak-e
        $this->assertEquals($player->classID, $player->skill1->classID);
        $this->assertEquals($player->classID, $player->skill2->classID);
        $this->assertEquals($player->classID, $player->skill3->classID);
    }

    public function testWeaponClassRelationship()
    {
        // Tesztadatok létrehozása
        $weapon = Weapon::factory()->create(['classID' => 2]); // Példa adatok a Musketer osztályhoz
        $class = Classes::find(2); // Musketer osztály lekérése

        // Ellenőrizzük, hogy a Weapon modellhez tartozó osztály egyezik-e a várt osztállyal
        $this->assertEquals($class->name, $weapon->class->name);
    }
}
