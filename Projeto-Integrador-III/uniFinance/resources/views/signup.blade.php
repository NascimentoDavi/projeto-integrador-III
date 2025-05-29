<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Criar Usuário</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  {{-- Custom CSS Sets --}}
  @vite('resources/css/app.css')

  <style>
    :root {
      --cor-fundo: #042340;
      --cor-botoes: #dea844;
      --cor-hover: #be8f37;
    }

    body {
      background-color: var(--cor-fundo);
      background: linear-gradient(135deg, #042340, #0d3c61);
    }

    .form-container {
      max-width: 600px;
      margin: 80px auto;
      padding: 2rem;
      background-color: white;
      border-radius: 0.5rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

  <div class="form-container">

    <div class="d-flex align-items-center justify-content-align mb-4">
      <img src="{{ asset('img/unifinanceLogo.jpg') }}" alt="Logo da Empresa" class="img-fluid rounded-circle"
        style="max-height: 40px; margin-right: 5px;">
      <h1 class="h5 mb-0"> Unifinance</h1>
    </div>

    <h2 class="text-center mb-4">Criar Novo Usuário</h2>

    {{-- Caso encontre erros --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Erros encontrados:</strong>
        <ul class="mb-0">
          @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('users-create') }}" method="POST" enctype="multipart/form-data">
      @csrf

      {{-- NOME COMPLETO --}}
      <div class="mb-3">
        <label class="form-label">Nome Completo</label>
        <input type="text" name="completeName" class="form-control" value="{{ old('completeName') }}" required>
      </div>

      {{-- EMAIL --}}
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
      </div>

      {{-- SENHA --}}
      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <div class="input-group">
          <input type="password" class="form-control" id="password" name="password" required>
          <button type="button" class="btn btn-outline-secondary" id="togglePassword" tabindex="-1">
            <i class="bi bi-eye"></i>
          </button>
        </div>
      </div>

      {{-- CONFIRMAÇÃO DE SENHA --}}
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirme a Senha</label>
        <div class="input-group">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
          <button type="button" class="btn btn-outline-secondary" id="toggleConfirmPassword" tabindex="-1">
            <i class="bi bi-eye"></i>
          </button>
        </div>
      </div>

      <small id="invalid_password_msg" style="color: red;"></small>

      {{-- FOTO DE PERFIL --}}
      <div class="mb-3">
        <label class="form-label">Foto de Perfil</label>
        <input type="file" name="profile_photo" class="form-control">
      </div>

      {{-- CRIAR USUÁRIO --}}
      <div class="d-grid">
        <button type="submit" class="btn btn-primary" id="submitBtn">Sign Up</button>
      </div>

      <div class="d-grid"><a href=""></a></div>

    </form>
  </div>

  <!-- Bootstrap JS -->
  <script>
    function togglePassword(inputId, buttonId) {
      const input = document.getElementById(inputId);
      const button = document.getElementById(buttonId);
      const icon = button.querySelector('i');

      button.addEventListener('click', () => {
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';

        // Alterna entre os ícones de olho aberto e olho fechado
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
      });
    }

    // Inicializa os dois toggles
    togglePassword('password', 'togglePassword');
    togglePassword('password_confirmation', 'toggleConfirmPassword');

    const password = document.getElementById('password');
    const password_confirmation = document.getElementById('password_confirmation');
    const invalid_password_msg = document.getElementById('invalid_password_msg');
    const submitBtn = document.getElementById('submitBtn');

    function checkPasswords() {
      if (password_confirmation.value !== password.value) {
        invalid_password_msg.textContent = 'As credenciais não estão iguais';
        submitBtn.disabled = true;
      } else {
        invalid_password_msg.textContent = '';
        submitBtn.disabled = false;
      }
    }

    // Valida a cada input digitado
    password_confirmation.addEventListener('input', checkPasswords);
    password.addEventListener('input', checkPasswords);
  </script>

</body>

</html>
