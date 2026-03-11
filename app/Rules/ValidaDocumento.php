<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidaDocumento implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $numero = preg_replace('/[^0-9]/', '', $value);

        if (strlen($numero) == 11) {
            if (!$this->validaCpf($numero)) {
                $fail('CPF inválido.');
            }
            return;
        }

        if (strlen($numero) == 14) {
            if (!$this->validaCnpj($numero)) {
                $fail('CNPJ inválido.');
            }
            return;
        }

        $fail('Informe um CPF ou CNPJ válido.');
    }
    private function validaCpf($cpf)
    {
        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf[$c] != $d) return false;
        }

        return true;
    }

    private function validaCnpj($cnpj)
    {
        if (preg_match('/(\d)\1{13}/', $cnpj)) return false;

        $tamanho = 12;
        $numeros = substr($cnpj, 0, $tamanho);
        $digitos = substr($cnpj, $tamanho);

        $soma = 0;
        $pos = $tamanho - 7;

        for ($i = $tamanho; $i >= 1; $i--) {
            $soma += $numeros[$tamanho - $i] * $pos--;
            if ($pos < 2) $pos = 9;
        }

        $resultado = $soma % 11 < 2 ? 0 : 11 - $soma % 11;

        if ($resultado != $digitos[0]) return false;

        return true;
    }
}
