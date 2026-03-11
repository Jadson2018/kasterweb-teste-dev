<?php
namespace App\Repositories;

use App\Models\Empresa;
use App\Models\User;

class EmpresaRepository
{
    /**
     * Vincula um usuário a uma empresa recém-criada.
     */
    public function assignUserToCompany(User $usuario, Empresa $empresa): void
    {
        $usuario->update([
            'empresa_id' => $empresa->id,
            'nivel' => 1, // Torna Admin (Nível 1)
        ]);
    }

    public function deleteCompany(int $empresaId): void
    {
        // desvincula todos os usuários da empresa
        User::where('empresa_id', $empresaId)
        ->update([
            'empresa_id' => 0,
            'nivel' => 3
        ]);

        // remove a empresa
        Empresa::findOrFail($empresaId)->delete();
   }
}