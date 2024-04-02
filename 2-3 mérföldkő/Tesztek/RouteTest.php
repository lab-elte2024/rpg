<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RouteTest extends TestCase
{

    /** @test */

    public function test_basic_routes(): void
    {

        $response = $this->get('/stat');
        $response->assertViewHas('stat');
        $response = $this->get('/menu');
        $response->assertViewHas('menu');
        $response = $this->get('/blacksmith');
        $response->assertViewHas('village.blacksmith');
        $response = $this->get('/login');
        $response->assertViewHas('auth.login');
        $response = $this->get('/registration');
        $response->assertViewHas('auth.registration');
    }

    public function test_assertsee(): void
    {
        $response = $this->get('/');
        $response->assertOk();
        $response->assertSee('');
    }

    public function testDatabaseConnection()
    {
        // Próbáljuk meg létrehozni egy adatbázis kapcsolatot
        try {
            $pdo = DB::connection()->getPdo();
            $connected = true;
        } catch (\Exception $e) {
            $connected = false;
        }

        // Ellenőrizzük, hogy sikerült-e a kapcsolódás
        $this->assertTrue($connected, 'Nem sikerült kapcsolódni az adatbázishoz.');
    }
}
