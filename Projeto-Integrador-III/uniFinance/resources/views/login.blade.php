<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <div class="container">
        
        <h2>Login</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Senha</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <div id="message">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</body>
</html>
