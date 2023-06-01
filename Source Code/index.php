<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Karyawan.controller.php");

$karyawan = new KaryawanController();
$karyawan->index();

if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  if($id > 0){
    $karyawan->delete($id);
  }
}