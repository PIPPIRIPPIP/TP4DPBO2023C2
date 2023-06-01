<?php

class Jabatan extends DB
{
    function getJabatan()
    {
        $query = "SELECT * FROM jabatan";
        return $this->execute($query);
    }

    function getJabatanById($id)
    {
        $query = "SELECT * FROM jabatan WHERE jabatan_id='$id'";
        return $this->execute($query);
    }

    function addJabatan($data)
    {
        $name = $data['jabatan_nama'];
        $query = "INSERT INTO jabatan values ('', '$name')";
        return $this->executeAffected($query);
    }

    function deleteJabatan($id)
    {
        $query = "DELETE FROM jabatan WHERE jabatan_id = '$id'";
        return $this->executeAffected($query);
    }

    function updateJabatan($id, $data)
    {
        $name = $data['jabatan_nama'];
        $query = "UPDATE jabatan set jabatan_nama = '$name' where jabatan_id = '$id'";
        return $this->executeAffected($query);
    }
}
