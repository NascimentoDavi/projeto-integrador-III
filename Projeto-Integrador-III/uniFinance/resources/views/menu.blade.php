@extends('layouts.app')

@section('title', 'Menu Inicial')

@section('content')

  <!-- Cabeçalho mobile com botão -->
  <div class="mobile-header d-md-none">
    <button id="hamburgerBtn" class="btn btn-dark m-2">
      <i class="bi bi-list"></i>
    </button>
  </div>

  <!-- Conteúdo principal -->
  <div id="content" class="content">
    <h1>Bem-vindo {{ auth()->user()['completeName'] }} </h1>
    <p>Grandes coisas estão por vir, aguarde por novidades</p>
  </div>


  {{-- Script da Sidebar --}}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');

        btn.addEventListener('click', function () {
            sidebar.classList.toggle('show');
        });

        // Fecha o menu se clicar fora (opcional)
        document.addEventListener('click', function (e) {
            if (window.innerWidth < 768 && !sidebar.contains(e.target) && !btn.contains(e.target)) {
            sidebar.classList.remove('show');
            }
        });
    });
  </script>



</body>
</html>

@endsection()
