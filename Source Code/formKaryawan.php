<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Karyawan.controller.php");

$karyawan = new KaryawanController();

if (isset($_POST['btn-submit'])) {
    // melakukan add
    $karyawan->add($_POST);
} else if (isset($_GET['id'])) {
    // masuk ke form update
    $id = $_GET['id'];
    if ($id > 0) {
        $karyawan->formUpdate($id);
    }
} else if (isset($_POST['btn-update'])) {
    // malakukan update
    $id = $_POST['id'];
    $karyawan->update($id, $_POST);
} else {
    // Masuk ke form tambah
    $karyawan->formAdd();
}