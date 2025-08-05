<?php
require "include/conn.php";

$id = $_GET['id'];
$sql = "SELECT * FROM saw_alternatives WHERE id_alternative = '$id'";
$result = $db->query($sql);
$row = $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<?php require "layout/head.php"; ?>

<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex">
        <?php require "layout/sidebar.php"; ?>

        <div class="flex-1 p-6">
            <!-- Header -->
            <header class="mb-6">
                <h1 class="text-2xl font-semibold">Edit Alternatif</h1>
            </header>

            <!-- Card Form -->
            <div class="max-w-5xl h-auto mx-auto bg-white shadow-md rounded-md p-6">
                <h2 class="text-lg font-bold mb-4">Form Edit Alternatif</h2>
                <form action="alternatif-edit-act.php" method="POST" class="space-y-4">
                    <!-- Hidden ID -->
                    <input type="hidden" name="id_alternative" value="<?= htmlspecialchars($row['id_alternative']); ?>">

                    <!-- Nama Alternatif -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Alternatif</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="<?= htmlspecialchars($row['name']); ?>"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            required>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end space-x-2">
                        <a href="alternatif.php" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan Perubahan</button>
                    </div>
                </form>
            </div>

            <?php require "layout/footer.php"; ?>
        </div>
    </div>

    <?php require "layout/js.php"; ?>
</body>

</html>