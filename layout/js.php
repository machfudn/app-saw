<script>
	// Fungsi toggle untuk submenu
	function toggleSubMenu() {
		const submenu = document.getElementById('submenu');
		const arrowIcon = document.getElementById('arrowIcon');

		submenu.classList.toggle('hidden');
		arrowIcon.classList.toggle('rotate-180');

		if (submenu.classList.contains('hidden')) {
			submenu.style.maxHeight = '0';
		} else {
			submenu.style.maxHeight = submenu.scrollHeight + 'px';
		}
	}

	document.addEventListener('DOMContentLoaded', function() {
		// Submenu init
		const submenu = document.getElementById('submenu');
		submenu.style.transition = 'max-height 0.3s ease-out, opacity 0.2s ease';
		submenu.style.overflow = 'hidden';
		submenu.style.maxHeight = '0';

		// Sidebar
		const sidebar = document.getElementById('sidebar');
		const openBtn = document.getElementById('openSidebar');
		const closeBtns = document.querySelectorAll('#closeSidebar');

		function toggleSidebar(shouldOpen) {
			const isOpen = !sidebar.classList.contains('-translate-x-full');
			const open = typeof shouldOpen !== 'undefined' ? shouldOpen : !isOpen;

			if (open) {
				sidebar.classList.remove('-translate-x-full');
				sidebar.classList.remove('h-auto');
				sidebar.classList.add('h-full');
				openBtn.classList.add('hidden');
				closeBtns.forEach(btn => btn.classList.remove('hidden'));
				document.body.style.overflow = 'hidden';
			} else {
				sidebar.classList.add('-translate-x-full');
				openBtn.classList.remove('hidden');
				sidebar.classList.remove('h-full');
				closeBtns.forEach(btn => btn.classList.add('hidden'));
				document.body.style.overflow = '';
			}
		}

		openBtn.addEventListener('click', () => toggleSidebar(true));
		closeBtns.forEach(btn => {
			btn.addEventListener('click', () => toggleSidebar(false));
		});

		document.addEventListener('click', function(e) {
			if (
				window.innerWidth < 768 &&
				!sidebar.contains(e.target) &&
				e.target !== openBtn &&
				!sidebar.classList.contains('-translate-x-full')
			) {
				toggleSidebar(false);
			}
		});

		// Modal functions
		window.openModal = function(id) {
			const modal = document.getElementById(id);
			modal.classList.remove('hidden');

			setTimeout(() => {
				modal.addEventListener('click', function handleOutsideClick(e) {
					if (e.target === modal) {
						closeModal(id);
						modal.removeEventListener('click', handleOutsideClick);
					}
				});
			}, 10);
		};

		window.closeModal = function(id) {
			document.getElementById(id).classList.add('hidden');
		};

		// Dropdown
		window.toggleDropdown = function(id) {
			document.querySelectorAll("[id^='dropdown-']").forEach(el => {
				if (el.id !== id) el.classList.add('hidden');
			});
			const dropdown = document.getElementById(id);
			dropdown.classList.toggle('hidden');
		};

		// Close dropdown when clicking outside
		window.addEventListener('click', function(e) {
			if (
				!e.target.closest("[id^='dropdown-']") &&
				!e.target.closest("button[onclick^='toggleDropdown']")
			) {
				document.querySelectorAll("[id^='dropdown-']").forEach(el =>
					el.classList.add('hidden')
				);
			}
		});
	});
</script>