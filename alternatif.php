<?php
require "layout/head.php";
require "include/conn.php";
?>

<body class="bg-gray-50">
    <div id="app" class="flex min-h-screen">
        <?php require "layout/sidebar.php"; ?>

        <div id="main" class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm py-3 px-4 sticky top-0 z-10">
                <div class="flex justify-between items-center">
                    <button id="burgerBtn" class="xl:hidden text-2xl text-gray-600 focus:outline-none">
                        <i class="bi bi-justify"></i>
                    </button>
                </div>
            </header>

            <main class="flex-1 p-4">
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Alternatif</h3>
                </div>

                <section>
                    <div class="w-full">
                        <div class="bg-white rounded-lg shadow-md">
                            <div class="border-b border-gray-200 px-6 py-4">
                                <h4 class="text-lg font-medium text-gray-800">Tabel Alternatif</h4>
                            </div>

                            <div class="p-6">
                                <button onclick="openModal('addModal')" class="mb-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                                    Tambah Alternatif
                                </button>

                                <div>
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                                <th class="px-15 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <?php
                                            $sql = 'SELECT id_alternative, name FROM saw_alternatives';
                                            $result = $db->query($sql);
                                            $i = 0;

                                            $modals = ""; // Simpan semua modal di luar <tbody>

                                            while ($row = $result->fetch_object()) {
                                                $id = $row->id_alternative;
                                                $name = htmlspecialchars($row->name);

                                                echo "
    <tr>
        <td class='px-6 py-4 text-sm text-gray-500'>" . (++$i) . "</td>
        <td class='px-6 py-4 text-sm text-gray-900'>{$name}</td>
        <td class='px-6 py-4 text-right text-sm font-medium'>
            <div class='relative inline-block text-left'>
                <button onclick=\"toggleDropdown('dropdown-{$id}')\" class='inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-3 py-1 bg-blue-500 text-white text-sm hover:bg-blue-600'>
                    Aksi
                    <svg class='ml-2 h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'>
                        <path d='M19 9l-7 7-7-7' />
                    </svg>
                </button>
                <div id='dropdown-{$id}' class='hidden absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50'>
                    <a href='alternatif-edit.php?id={$id}' class='w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100'>Edit</a>
                    <button onclick=\"openModal('deleteModal-{$id}')\" class='w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-100'>Hapus</button>
                </div>
            </div>
        </td>
    </tr>
    ";

                                                // Simpan modal delete di luar <tbody>
                                                $modals .= "
    <div id='deleteModal-{$id}' class='fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden'>
        <div class='bg-white rounded-lg w-full max-w-md p-6'>
            <h2 class='text-lg font-semibold mb-4'>Yakin ingin menghapus alternatif ini?</h2>
            <div class='flex justify-end space-x-2'>
                <button type='button' onclick=\"closeModal('deleteModal-{$id}')\" class='px-4 py-2 bg-gray-200 rounded'>Batal</button>
                <a href='alternatif-hapus.php?id={$id}' class='px-4 py-2 bg-red-600 text-white rounded'>Hapus</a>
            </div>
        </div>
    </div>
    ";
                                            }

                                            $result->free();
                                            ?>
                                        </tbody>

                                        <!-- Semua modal delete ditempatkan di luar <tbody> agar valid secara HTML -->
                                        <?= $modals ?>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <?php require "layout/footer.php"; ?>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="addModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 hidden">
        <div class="bg-white rounded-lg w-full max-w-md p-6">
            <h2 class="text-xl font-semibold mb-4">Tambah Alternatif</h2>
            <form action="alternatif-simpan.php" method="POST">
                <input type="text" name="name" placeholder="Nama Kandidat" required class="w-full border border-gray-300 rounded-md p-2 mb-4">
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('addModal')" class="px-4 py-2 bg-gray-200 rounded">Batal</button>
                    <button type="submit" name="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        function toggleDropdown(id) {
            document.querySelectorAll("[id^='dropdown-']").forEach(el => {
                if (el.id !== id) el.classList.add('hidden');
            });
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            if (!e.target.closest('[id^="dropdown-"]') && !e.target.closest('button[onclick^="toggleDropdown"]')) {
                document.querySelectorAll("[id^='dropdown-']").forEach(el => el.classList.add('hidden'));
            }
        });
    </script>

    <?php require "layout/js.php"; ?>
</body>