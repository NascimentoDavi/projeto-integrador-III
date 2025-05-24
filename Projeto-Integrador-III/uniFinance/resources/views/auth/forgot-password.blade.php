<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    {{-- Custom CSS Sets --}}
    @vite('resources/css/app.css')

<title>Login</title>

    <style>
        :root{
            --cor-fundo: #042340;
            --cor-botoes: #dea844;
            --cor-hover: #be8f37;
            --cor-prata: #c8d5e6;
        }
        body {
            background-color: var(--cor-fundo);
            background: linear-gradient(135deg, #042340, #0d3c61);
        }
        .login-container {
            max-width: 500px;
            margin: 150px auto;
            padding: 2rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: var(--cor-botoes) !important;
            border-color: #000 !important;
            color: #000 !important;
        }
        .btn-primary:hover {
        background-color: var(--cor-hover) !important;
        border-color: #000 !important;
        }
    </style>
</head>

<body>

    <div class="login-container">

    <div class="d-flex align-items-center justify-content-align mb-4">
        <img src="{{ asset('img/unifinanceLogo.jpg') }}" alt="Logo da Empresa" class="img-fluid rounded-circle" style="max-height: 40px; margin-right: 5px;">
        <h1 class="h5 mb-0">Unifinance</h1>
    </div>

    <h2 class="text-center mb-4">E-mail</h2>
    <form action="{{ route('password-email') }}" method="POST">
        @csrf

        {{-- EMAIL --}}
        <div class="mb-3">
            <label for="email" class="form-label" id="email">Email</label>
            <input type="email" class="form-control" placeholder="Your email" name="password"required>
        </div>

        {{-- Mensagem de erro --}}
        <div id="message">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Send link</button>
        </div>
    </form>
    </div>


    <script>
        const senhaInput = document.getElementById('password');
        const toggleBtn = document.getElementById('toggleSenha');

        toggleBtn.addEventListener('click', function () {
            const tipoAtual = senhaInput.getAttribute('type');
            senhaInput.setAttribute('type', tipoAtual === 'password' ? 'text' : 'password');
            icon.classList.toggle('bi-eye');
        });
    </script>


</body>
</html>
