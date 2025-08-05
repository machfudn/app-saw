<?php
require "include/conn.php";

$id = $_GET['id'];
$sql = "SELECT * FROM saw_criterias WHERE id_criteria = '$id'";
$result = $db->query($sql);
$row = $result->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<?php require "layout/head.php"; ?>

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
            <div class="mb-6">
                <h1 class="text-2xl font-semibold">Edit Bobot Kriteria</h1>
            </div>

            <!-- Form Edit -->
            <div class="max-w-2xl mx-auto bg-white shadow-md rounded-md p-6">
                <h2 class="text-lg font-bold mb-4">Form Edit Kriteria</h2>
                <form action="bobot-edit-act.php" method="POST" class="space-y-5">
                    <!-- ID sebagai hidden input -->
                    <input type="hidden" name="id_criteria" value="<?= htmlspecialchars($row['id_criteria']); ?>">

                    <!-- Kriteria -->
                    <div>
                        <label for="criteria" class="block text-sm font-medium text-gray-700 mb-1">Kriteria</label>
                        <input type="text" id="criteria" name="criteria"
                            value="<?= htmlspecialchars($row['criteria']); ?>"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            required>
                    </div>

                    <!-- Weight -->
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700 mb-1">Bobot</label>
                        <input type="number" step="any" id="weight" name="weight"
                            value="<?= htmlspecialchars($row['weight']); ?>"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            required>
                    </div>

                    <!-- Attribute -->
                    <div>
                        <label for="attribute" class="block text-sm font-medium text-gray-700 mb-1">Atribut</label>
                        <select id="attribute" name="attribute"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            required>
                            <option value="benefit" <?= $row['attribute'] === 'benefit' ? 'selected' : '' ?>>Benefit</option>
                            <option value="cost" <?= $row['attribute'] === 'cost' ? 'selected' : '' ?>>Cost</option>
                        </select>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex justify-end space-x-3">
                        <a href="bobot.php"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan Perubahan</button>
                    </div>
                </form>
            </div>

            <?php require "layout/footer.php"; ?>
        </div>
    </div>

    <?php require "layout/js.php"; ?>
</body>

</html>