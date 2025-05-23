  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <a href="{{ route( 'menu') }}" class="nav-link"><i class="bi bi-house"></i><span>Início</span></a>
    <a href="{{ route('dashboard') }}" class="nav-link"><i class="bi bi-info-circle"></i><span>dashboards</span></a>
    <a href="{{ route('accounts') }}" class="nav-link"><i class="bi bi-bank"></i><span>Contas Bancárias</span></a>
    <a href="{{ route( 'menu') }}"" class="nav-link"><i class="bi bi-gear"></i><span>Transações</span></a>
    <a href="{{ route( 'menu') }}"" class="nav-link"><i class="bi bi-envelope"></i><span>Budget</span></a>

    <!-- Botão de Logout na parte inferior -->
    <form method="POST" action="{{ route('logout') }}" class="position-absolute bottom-0 w-100">
        @csrf
        <button type="submit" class="nav-link border-0 bg-transparent text-start">
            <i class="bi bi-box-arrow-right"></i><span>Logout</span>
        </button>
    </form>
  </div>
