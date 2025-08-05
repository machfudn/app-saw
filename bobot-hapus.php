<?php
require "include/conn.php";

$id = $_GET['id'];
$sql = "DELETE FROM saw_criterias WHERE id_criteria = '$id'";
$db->query($sql);
header("Location: bobot.php");
