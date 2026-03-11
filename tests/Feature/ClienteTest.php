<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ClienteTest extends TestCase
{
    use RefreshDatabase; // Limpa o banco de dados a cada teste

    /** @test */
    public function a_pagina_de_listagem_de_clientes_pode_ser_acessada()
    {
        // 1. Prepara o cenário (Cria um usuário para logar de nivel 3)
        $user = User::factory()->create();

        // 2. Executa a ação (Acessa a rota como o usuário)
        $response = $this->actingAs($user)->get('/admin/clientes');

        // 3. Verifica se a pagina só pode ser acessada por usuarios de nivel 1 e 2
        $response->assertStatus(403);
    }
}
