<?php
include_once("connection.php");
include_once("models/Jabatan.class.php");
include_once("views/Jabatan.view.php");
include_once("views/formJabatan.view.php");

class JabatanController {
  private $jabatan;

  function __construct(){
    $this->jabatan = new Jabatan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->jabatan->open();
    $this->jabatan->getJabatan();
    $data = array();
    while($row = $this->jabatan->getResult()){
      array_push($data, $row);
    }

    $this->jabatan->close();

    $view = new JabatanView();
    $view->render($data);
  }

  
  public function add($data){
    $this->jabatan->open();
    $this->jabatan->addJabatan($data);
    $this->jabatan->close();
    
    header("location:jabatan.php");
  }

  public function edit($id, $data){
    $this->jabatan->open();
    $this->jabatan->updateJabatan($id, $data);
    $this->jabatan->close();
    
    header("location:jabatan.php");
  }

  public function delete($id){
    $this->jabatan->open();
    $this->jabatan->deleteJabatan($id);
    $this->jabatan->close();
    
    header("location:jabatan.php");
  }

  public function formAdd()
    {
        $view = new FormJabatanView();
        $view->renderAdd();
    }

    public function formUpdate($id)
    {
        // ngambil data jabatan
        $this->jabatan->open();
        $this->jabatan->getJabatanById($id);
        $dataGroup = array();
        while ($row = $this->jabatan->getResult()) {
            array_push($dataGroup, $row);
        }
        $this->jabatan->close();

        $view = new FormJabatanView();
        $view->renderUpdate($dataGroup);
    }

}