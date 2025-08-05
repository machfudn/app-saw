<?php
require "include/conn.php";

$id_alternative = $_POST['id_alternative'];
$id_criteria = $_POST['id_criteria'];
$value = $_POST['value'];

// Cegah duplikat data (jika kombinasi sudah ada)
$check = $db->prepare("SELECT * FROM saw_evaluations WHERE id_alternative = ? AND id_criteria = ?");
$check->bind_param("ii", $id_alternative, $id_criteria);
$check->execute();
$check_result = $check->get_result();

if ($check_result->num_rows > 0) {
    // Update jika sudah ada
    $stmt = $db->prepare("UPDATE saw_evaluations SET value = ? WHERE id_alternative = ? AND id_criteria = ?");
    $stmt->bind_param("dii", $value, $id_alternative, $id_criteria);
} else {
    // Insert jika belum ada
    $stmt = $db->prepare("INSERT INTO saw_evaluations (id_alternative, id_criteria, value) VALUES (?, ?, ?)");
    $stmt->bind_param("iid", $id_alternative, $id_criteria, $value);
}

if ($stmt->execute()) {
    header("Location: ./matrik.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}
