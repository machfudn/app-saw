// Toggle submenu
function toggleSubMenu() {
  const submenu = document.getElementById('submenu');
  const arrow = document.getElementById('arrowIcon');
  submenu.classList.toggle('hidden');
  arrow?.classList.toggle('rotate-180');
}

// Toggle sidebar on mobile
document.getElementById('hamburger')?.addEventListener('click', () => {
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('hidden');
});
