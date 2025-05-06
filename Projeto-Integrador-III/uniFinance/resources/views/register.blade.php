<!DOCTYPE html>
<html>
<head>
    <title>Criar Usuário</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Criar Novo Usuário</h1>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Erros encontrados:</strong>
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nome Completo:</label><br>
        <input type="text" name="completeName" value="{{ old('completeName') }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirme a Senha:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <label>Foto de Perfil:</label><br>
        <input type="file" name="profile_photo"><br><br>

        <button type="submit">Criar Usuário</button>
    </form>
</body>
</html>
