<?php
namespace App\Repositories;
use Filament\Facades\Filament;
use App\Models\User;

class ColaboradorRepository
{
    /**
     * Vincula o cliente a empresa do admin.
     */
    public function atualizarNivel(array $data): void
    {
        $user = User::findOrFail($data['user_id']);

        $user->nivel = $data['nivel'];

        if ($data['nivel'] == 3) {
            $user->empresa_id = 0;
        } else {
            $user->empresa_id = Filament::auth()->user()->empresa_id;
        }

        $user->save();
    }
}