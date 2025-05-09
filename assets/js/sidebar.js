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
