<?php

namespace Database\Seeders;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Criar uma Empresa
        $empresa = Empresa::create([
            'nome' => 'Empresa LTDA',
            'cnpj' => '12.345.678/0001-99',
            'email' => 'empresa@gmail.com',
            'telefone' => '(99) 99999-9999',
        ]);

        //Criar Usuário Nível 1 
        // Ao criar, vinculamos ele à empresa e setamos o nível 1
        $dono = User::factory()->create([
            'name' => 'Dono da Empresa',
            'email' => 'dono@empresa.com',
            'nivel' => 1,
            'empresa_id' => $empresa->id,
        ]);

        //Criar Usuário Nível 2 (Colaborador da mesma empresa)
        User::factory()->create([
            'name' => 'Colaborador',
            'email' => 'colaborador@empresa.com',
            'nivel' => 2,
            'empresa_id' => $empresa->id,
        ]);

        //Criar Usuário Nível 3 (Usuário comum, sem empresa)
        User::factory()->create([
            'name' => 'Usuario Comum',
            'email' => 'comum@teste.com',
            'nivel' => 3,
            'empresa_id' => null, // Não pertence a nenhuma empresa
        ]);

        //Criar Clientes vinculados à empresa
        // Como o dono (Nível 1) pode criar, usamos o ID da empresa criada
        Cliente::factory()->count(10)->create([
            'empresa_id' => $empresa->id,
        ]);
    }
}
