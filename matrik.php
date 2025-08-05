<!DOCTYPE html>
<html lang="en">
<?php
require "layout/head.php";
require "include/conn.php";
?>

<body class="bg-gray-100 text-gray-800">
  <div id="app" class="flex min-h-screen">
    <?php require "layout/sidebar.php"; ?>
    <div id="main" class="flex-1 p-6">
      <!-- Header -->
      <header class="mb-6">
        <h1 class="text-2xl font-semibold">Matriks</h1>
      </header>

      <!-- Konten -->
      <section class="space-y-6">
        <div class="bg-white shadow-md rounded-md p-6">
          <h2 class="text-xl font-semibold mb-4">Matriks Keputusan (X) & Ternormalisasi (R)</h2>
          <p class="text-sm text-gray-600 mb-4">
            Melakukan perhitungan normalisasi untuk mendapatkan matriks nilai ternormalisasi (R):<br>
            Jika kriteria bertipe cost: Rij = min{Xij} / Xij<br>
            Jika bertipe benefit: Rij = Xij / max{Xij}
          </p>
          <button onclick="document.getElementById('inlineForm').classList.remove('hidden')"
            class="bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 mb-4">
            + Isi Nilai Alternatif
          </button>

          <!-- Matriks Keputusan -->
          <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-gray-300">
              <caption class="caption-top text-sm mb-2">Matrik Keputusan (X)</caption>
              <thead class="bg-gray-200">
                <tr>
                  <th class="px-4 py-2 border">Alternatif</th>
                  <th class="px-4 py-2 border">Nama</th>
                  <?php
                  $criteria = $db->query("SELECT id_criteria FROM saw_criterias ORDER BY id_criteria");
                  $i = 1; // Mulai dari C1
                  while ($c = $criteria->fetch_object()) {
                    echo "<th class='px-4 py-2 border'>C{$i}</th>";
                    $i++; // Naikkan untuk C2, C3, dst
                  }
                  ?>

                  <th class="px-4 py-2 border">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT a.id_alternative, b.name,
            SUM(IF(a.id_criteria=1,a.value,0)) AS C1,
            SUM(IF(a.id_criteria=2,a.value,0)) AS C2,
            SUM(IF(a.id_criteria=3,a.value,0)) AS C3,
            SUM(IF(a.id_criteria=4,a.value,0)) AS C4,
            SUM(IF(a.id_criteria=5,a.value,0)) AS C5
          FROM saw_evaluations a
          JOIN saw_alternatives b USING(id_alternative)
          GROUP BY a.id_alternative
          ORDER BY a.id_alternative";
                $result = $db->query($sql);
                $X = array(1 => [], 2 => [], 3 => [], 4 => [], 5 => []);
                $i = 1; // <-- Tambahkan counter manual
                while ($row = $result->fetch_object()) {
                  for ($j = 1; $j <= 5; $j++) array_push($X[$j], round($row->{"C$j"}, 2));
                  echo "<tr class='text-center'>
            <td class='border px-4 py-2'>A{$i}</td>
            <td class='border px-4 py-2'>{$row->name}</td>
            <td class='border px-4 py-2'>" . round($row->C1, 2) . "</td>
            <td class='border px-4 py-2'>" . round($row->C2, 2) . "</td>
            <td class='border px-4 py-2'>" . round($row->C3, 2) . "</td>
            <td class='border px-4 py-2'>" . round($row->C4, 2) . "</td>
            <td class='border px-4 py-2'>" . round($row->C5, 2) . "</td>
            <td class='border px-4 py-2'>
              <a href='keputusan-hapus.php?id={$row->id_alternative}' class='text-red-600 hover:underline text-sm'>Hapus</a>
            </td>
          </tr>";
                  $i++; // <-- Increment setiap baris
                }
                $result->free();
                ?>
              </tbody>

            </table>

            <!-- Matriks Ternormalisasi -->
            <table class="min-w-full table-auto border border-gray-300 mt-6">
              <caption class="caption-top text-sm mb-2">Matrik Ternormalisasi (R)</caption>
              <thead class="bg-gray-200">
                <tr>
                  <th class="px-4 py-2 border">Alternatif</th>
                  <th class="px-4 py-2 border">Nama</th>
                  <?php
                  $criteria = $db->query("SELECT id_criteria FROM saw_criterias ORDER BY id_criteria");
                  $i = 1; // Mulai dari C1
                  while ($c = $criteria->fetch_object()) {
                    echo "<th class='px-4 py-2 border'>C{$i}</th>";
                    $i++; // Naikkan untuk C2, C3, dst
                  }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT a.id_alternative, b.name,
              SUM(IF(a.id_criteria=1, IF(c.attribute='benefit', a.value/" . max($X[1]) . ", " . min($X[1]) . "/a.value), 0)) AS C1,
              SUM(IF(a.id_criteria=2, IF(c.attribute='benefit', a.value/" . max($X[2]) . ", " . min($X[2]) . "/a.value), 0)) AS C2,
              SUM(IF(a.id_criteria=3, IF(c.attribute='benefit', a.value/" . max($X[3]) . ", " . min($X[3]) . "/a.value), 0)) AS C3,
              SUM(IF(a.id_criteria=4, IF(c.attribute='benefit', a.value/" . max($X[4]) . ", " . min($X[4]) . "/a.value), 0)) AS C4,
              SUM(IF(a.id_criteria=5, IF(c.attribute='benefit', a.value/" . max($X[5]) . ", " . min($X[5]) . "/a.value), 0)) AS C5
            FROM saw_evaluations a
            JOIN saw_alternatives b USING(id_alternative)
            JOIN saw_criterias c USING(id_criteria)
            GROUP BY a.id_alternative
            ORDER BY a.id_alternative";
                $result = $db->query($sql);
                while ($row = $result->fetch_object()) {
                  echo "<tr class='text-center'>
              <td class='border px-4 py-2'>A{$row->id_alternative}</td>
              <td class='border px-4 py-2'>{$row->name}</td>
              <td class='border px-4 py-2'>" . round($row->C1, 2) . "</td>
              <td class='border px-4 py-2'>" . round($row->C2, 2) . "</td>
              <td class='border px-4 py-2'>" . round($row->C3, 2) . "</td>
              <td class='border px-4 py-2'>" . round($row->C4, 2) . "</td>
              <td class='border px-4 py-2'>" . round($row->C5, 2) . "</td>
            </tr>";
                }
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
  <div id="inlineForm" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg w-full max-w-lg p-6">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Isi Nilai Kandidat</h2>
        <button onclick="document.getElementById('inlineForm').classList.add('hidden')" class="text-gray-600">&times;</button>
      </div>
      <form action="matrik-simpan.php" method="POST" class="space-y-4">
        <div>
          <label class="block text-sm font-medium">Nama Alternatif</label>
          <select name="id_alternative" class="w-full border border-gray-300 rounded px-3 py-2">
            <?php
            $sql = 'SELECT id_alternative, name FROM saw_alternatives';
            $result = $db->query($sql);
            while ($row = $result->fetch_object()) {
              echo "<option value='{$row->id_alternative}'>{$row->name}</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium">Kriteria</label>
          <select name="id_criteria" class="w-full border border-gray-300 rounded px-3 py-2">
            <?php
            $sql = 'SELECT * FROM saw_criterias';
            $result = $db->query($sql);
            while ($row = $result->fetch_object()) {
              echo "<option value='{$row->id_criteria}'>{$row->criteria}</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium">Value</label>
          <input type="text" name="value" required placeholder="Nilai..." class="w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <div class="flex justify-end space-x-2">
          <button type="button" onclick="document.getElementById('inlineForm').classList.add('hidden')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <?php require "layout/js.php"; ?>
</body>

</html>