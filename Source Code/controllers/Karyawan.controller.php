<?php
include_once("connection.php");
include_once("models/Karyawan.class.php");
include_once("models/Jabatan.class.php");
include_once("views/Karyawan.view.php");
include_once("views/formKaryawan.view.php");

class KaryawanController
{
    private $karyawan;
    private $jabatan;

    function __construct()
    {
        $this->karyawan = new Karyawan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->jabatan = new Jabatan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->karyawan->open();
        $this->karyawan->getKaryawan();

        $data = array();
        while ($row = $this->karyawan->getResult()) {
            array_push($data, $row);
        }
        $this->karyawan->close();
        $view = new KaryawanView();
        $view->render($data);
    }

    public function add($data)
    {
        $this->karyawan->open();
        $this->karyawan->addKaryawan($data);
        $this->karyawan->close();
        header("location:index.php");
    }

    public function delete($id)
    {
        $this->karyawan->open();
        $this->karyawan->deleteKaryawan($id);
        $this->karyawan->close();
        header("location:index.php");
    }

    public function update($id, $data)
    {
        $this->karyawan->open();
        $this->karyawan->updateKaryawan($id, $data);
        $this->karyawan->close();
        header("location:index.php");
    }

    public function formAdd()
    {
        // ngambil data jabatan
        $this->jabatan->open();
        $this->jabatan->getJabatan();
        $data = array();
        while ($row = $this->jabatan->getResult()) {
            array_push($data, $row);
        }
        $this->jabatan->close();
        
        $view = new FormKaryawanView();
        $view->renderAdd($data);
    }

    public function formUpdate($id)
    {
        // ngambil data jabatan
        $this->jabatan->open();
        $this->jabatan->getJabatan();
        $dataGroup = array();
        while ($row = $this->jabatan->getResult()) {
            array_push($dataGroup, $row);
        }
        $this->jabatan->close();

        // ngambil data karyawan
        $this->karyawan->open();
        $this->karyawan->getKaryawanById($id);
        $dataMember = array();
        while ($temp = $this->karyawan->getResult()) {
            array_push($dataMember, $temp);
        }
        $this->karyawan->close();

        $view = new FormKaryawanView();
        $view->renderUpdate($dataGroup, $dataMember);
    }
}