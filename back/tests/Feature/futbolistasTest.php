<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class futbolistasTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_FetchFutbolistas()
    {
        $response = $this->get('/api/futbolistas');
        
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => ['id', 'nombre', 'apellidos', 'nacionalidad', 'equipo', 'posicion', 'edad', 'created_at', 'updated_at'],
                 ]);
    }
}
