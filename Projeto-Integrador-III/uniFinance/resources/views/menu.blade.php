@extends('layouts.app')

@section('title', 'menu')

@section('content')

  <!-- Cabeçalho mobile com botão -->
  <div class="mobile-header d-md-none">
    <button id="hamburgerBtn" class="btn btn-dark m-2">
      <i class="bi bi-list"></i>
    </button>
  </div>

  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <a href="#" class="nav-link"><i class="bi bi-house"></i><span>Início</span></a>
    <a href="#" class="nav-link"><i class="bi bi-info-circle"></i><span>Sobre</span></a>
    <a href="#" class="nav-link"><i class="bi bi-gear"></i><span>Serviços</span></a>
    <a href="#" class="nav-link"><i class="bi bi-envelope"></i><span>Contato</span></a>
  </div>

  <!-- Conteúdo principal -->
  <div id="content" class="content">
    <h1>Bem-vindo</h1>
    <p>Use o botão de menu no mobile para abrir a barra lateral.</p>
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
