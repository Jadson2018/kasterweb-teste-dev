<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Empresa;
use PHPUnit\Framework\Attributes\Test;

class CriarEmpresaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    #[Test]
    public function criar_empresa_funciona()
    {
        // 1. Arrange: Cria usuário com nível de acesso (1 ou 2)
        $user = User::factory()->create(['nivel' => 1]);

        // 2. Act: Envia os dados para a rota de criação (ajuste a rota se necessário)
        $response = $this->actingAs($user)
            ->head('/admin/empresas/create', [
                'nome' => 'Testes',
                'razao_social' => 'Empresa Teste LTDA',
                'cnpj' => '12.345.678/0001-99',
                'email' => 'testes@gmail.com'
                
            ]);

        // 3. Assert: Verifica se usuarios de nivel 1 não podem criar empresas
        $response->assertStatus(403);

    }
}
