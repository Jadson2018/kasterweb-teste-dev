<?php
namespace App\Repositories;

use App\Models\Cliente;
use App\Models\User;

class ClienteRepository
{
    /**
     * Vincula o cliente a empresa do admin.
     */
    public function assignClientToCompany(User $usuario, Cliente $cliente): void
    {
        $cliente->update([
            'empresa_id' => $usuario->empresa_id,
        ]);
    }
}