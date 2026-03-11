<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <header class="flex justify-center items-center py-10">
            <div style="float: left;">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
        </header>
    </head>
    <body class="antialiased font-sans" style="background:#0D2647">
        <div class=" text-black/50 dark:bg-white dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                 <div class="bg-white p-6 rounded-lg shadow-md itens-center justify-center" style="color:black">
                    <img id="background" class="" src="imagens/logo.png" />
                    <h2 class="text-2xl font-bold mb-4">Bem-vindo ao SGC</h2>

                    <p class="mb-4">
                        O <strong>SGC - Sistema de Gerenciamento de Clientes</strong> foi desenvolvido para facilitar
                        o controle e a organização das informações dos seus clientes em um único lugar.
                    </p>

                    <p class="mb-4">
                        Com este sistema você pode cadastrar clientes, manter todas as informações importantes acessíveis de forma rápida
                        e segura.
                    </p>

                    <h3 class="text-xl font-semibold mt-6 mb-3">Principais funcionalidades:</h3>

                    <ul class="list-disc pl-6 space-y-1">
                       <li>Cadastro e gerenciamento de clientes</li>
                       <li>Cadastro e gerenciamento de equipe</li>
                       <li>Busca rápida por informações</li>
                       <li>Atualização e edição de dados de clientes</li>
                       <li>Organização centralizada das informações</li>
                    </ul>

                    <p class="mt-6">
                       Utilize o menu do sistema para acessar as funcionalidades disponíveis e começar
                       a gerenciar seus clientes de forma eficiente.
                    </p>
                </div>
            </div>
        </div>
    </body>
    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            SGC 2026 | Todos os direitos reservados
    </footer>
</html>
