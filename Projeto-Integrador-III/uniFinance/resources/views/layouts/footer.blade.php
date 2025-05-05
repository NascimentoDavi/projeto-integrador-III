<footer class="absolute bg-light py-4 mt-5 sticky-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mb-3">
                <h5>Sobre</h5>
                <p>Aqui você pode adicionar uma descrição breve sobre a aplicação ou empresa.</p>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <h5>Links Úteis</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('menu') }}" class="text-decoration-none">Menu</a></li>
                    <li><a href="{{ route('login') }}" class="text-decoration-none">Login</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <h5>Contatos</h5>
                <p>Email: contato@exemplo.com</p>
                <p>Telefone: (XX) XXXXX-XXXX</p>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="text-muted">&copy; {{ date('Y') }} Minha Aplicação. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>
