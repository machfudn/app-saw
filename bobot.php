<!DOCTYPE html>
<html lang="en">
<?php
require "layout/head.php";
require "include/conn.php";
?>

<body class="bg-gray-100 text-gray-800">
  <div id="app" class="min-h-screen flex">
    <?php require "layout/sidebar.php"; ?>

    <div id="main" class="flex-1 p-6">
      <!-- Header -->
      <header class="mb-6">
        <a href="#" class="inline-block xl:hidden text-gray-600 hover:text-gray-800">
          <i class="bi bi-justify text-2xl"></i>
        </a>
      </header>

      <!-- Judul Halaman -->
      <div class="mb-6 flex items-center">
        <h1 class="text-2xl font-semibold">Bobot Kriteria</h1>

      </div>

      <!-- Konten -->
      <section>
        <div class="bg-white shadow-md rounded-md p-6">
          <div class="mb-4">
            <h2 class="text-lg font-semibold">Tabel Bobot Kriteria</h2>
            <p class="text-sm text-gray-600">
              Pengambil keputusan memberi bobot preferensi dari setiap kriteria dengan jenis (Benefit/Cost):
            </p>
            <button onclick="document.getElementById('addModal').classList.remove('hidden')" class="bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700">
              + Tambah
            </button>
          </div>

          <!-- Tabel -->
          <div>
            <table class="min-w-full divide-y divide-gray-200">
              <caption class="text-sm text-left text-gray-500 mb-2">Tabel Kriteria C<sub>i</sub></caption>
              <thead class="bg-gray-100 text-gray-700">
                <tr>
                  <th class="px-4 py-2 text-left text-sm font-semibold">No</th>
                  <th class="px-4 py-2 text-left text-sm font-semibold">Simbol</th>
                  <th class="px-4 py-2 text-left text-sm font-semibold">Kriteria</th>
                  <th class="px-4 py-2 text-left text-sm font-semibold">Bobot</th>
                  <th class="px-4 py-2 text-left text-sm font-semibold">Atribut</th>
                  <th class="px-4 py-2 text-left text-sm font-semibold">Aksi</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <?php
                $sql = 'SELECT id_criteria, criteria, weight, attribute FROM saw_criterias';
                $result = $db->query($sql);
                $i = 0;

                while ($row = $result->fetch_object()) {
                  $id = $row->id_criteria;
                  $criteria = htmlspecialchars($row->criteria);
                  $weight = htmlspecialchars($row->weight);
                  $attribute = htmlspecialchars($row->attribute);

                  echo "
      <tr>
        <td class='px-4 py-2 text-sm'>" . (++$i) . "</td>
        <td class='px-4 py-2 text-sm'>C{$i}</td>
        <td class='px-4 py-2 text-sm'>{$criteria}</td>
        <td class='px-4 py-2 text-sm'>{$weight}</td>
        <td class='px-4 py-2 text-sm'>{$attribute}</td>
        <td class='px-4 py-2 text-sm'>
          <div class='relative inline-block text-left'>
            <button onclick=\"toggleDropdown('dropdown-{$id}')\"class='inline-flex justify-center w-full rounded-md bg-blue-500 px-3 py-1 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none'>
              Aksi
              <svg class='ml-2 -mr-1 h-5 w-5' viewBox='0 0 20 20' fill='currentColor'>
                <path fill-rule='evenodd' d='M5.23 7.21a.75.75 0 011.06.02L10 11.586l3.71-4.354a.75.75 0 111.14.976l-4.25 5a.75.75 0 01-1.14 0l-4.25-5a.75.75 0 01.02-1.06z' clip-rule='evenodd' />
              </svg>
            </button>

            <!-- Dropdown -->
            <div id='dropdown-{$id}' class='origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-50'>
              <div class='py-1'>
                <a href='bobot-edit.php?id={$id}' class='block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100'>Edit</a>
                <button onclick=\"openModal('deleteModal-{$id}')\" class='w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100'>Hapus</button>
              </div>
            </div>
          </div>
        </td>
      </tr>

      <!-- Modal Hapus -->
      <div id='deleteModal-{$id}' class='fixed inset-0 bg-black/80 flex items-center justify-center hidden z-50'>
        <div class='bg-white rounded-lg p-6 max-w-md w-full' onclick='event.stopPropagation()'>
          <h3 class='text-lg font-semibold mb-4'>Yakin ingin menghapus data ini?</h3>
          <div class='flex justify-end space-x-2'>
            <button onclick=\"closeModal('deleteModal-{$id}')\" class='px-4 py-2 bg-gray-300 rounded hover:bg-gray-400'>Batal</button>
            <a href='bobot-hapus.php?id={$id}' class='px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700'>Hapus</a>
          </div>
        </div>
      </div>
    ";
                }

                $result->free();
                ?>
              </tbody>

            </table>
          </div>
        </div>
      </section>
      <?php require "layout/footer.php"; ?>

    </div>
  </div>

  <!-- Modal Tambah -->
  <div id="addModal" class="fixed inset-0 bg-black/80 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
      <h3 class="text-lg font-semibold mb-4">Tambah Kriteria</h3>
      <form action="bobot-tambah-act.php" method="POST" class="space-y-4">
        <div>
          <label class="block text-sm font-medium">Kriteria</label>
          <input type="text" name="criteria" required class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-300">
        </div>
        <div>
          <label class="block text-sm font-medium">Bobot</label>
          <input type="number" step="any" name="weight" required class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-300">
        </div>
        <div>
          <label class="block text-sm font-medium">Atribut</label>
          <select name="attribute" required class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-300">
            <option value="benefit">Benefit</option>
            <option value="cost">Cost</option>
          </select>
        </div>
        <div class="flex justify-end space-x-2">
          <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
          <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
        </div>
      </form>
    </div>
  </div>
  <script>
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
  </script>

  <?php require "layout/js.php"; ?>
</body>

</html>