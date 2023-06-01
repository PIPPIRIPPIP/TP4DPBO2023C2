<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Jabatan.controller.php");

$jabatan = new JabatanController();
$jabatan->index();

if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  if($id > 0){
    $jabatan->delete($id);
  }
}