<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Jabatan.controller.php");

$jabatan = new JabatanController();

if (isset($_POST['btn-submit'])) {
    // melakukan add
    $jabatan->add($_POST);
} else if (isset($_GET['id'])) {
    // masuk ke form update
    $id = $_GET['id'];
    if ($id > 0) {
        $jabatan->formUpdate($id);
    }
} else if (isset($_POST['btn-update'])) {
    // malakukan update
    $id = $_POST['id'];
    $jabatan->edit($id, $_POST);
} else {
    // masuk ke form tambah
    $jabatan->formAdd();
}