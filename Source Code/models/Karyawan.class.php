<?php

class Karyawan extends DB
{
    function getKaryawan()
    {
        $query = "SELECT * FROM karyawan JOIN jabatan ON karyawan.jabatan_id = jabatan.jabatan_id";
        return $this->execute($query);
    }

    function getKaryawanById($id)
    {
        $query = "SELECT * FROM karyawan where karyawan_id=$id";
        return $this->execute($query);
    }

    function addKaryawan($data)
    {
        $name = $data['karyawan_nama'];
        $date = $data['karyawan_date'];
        $phone = $data['karyawan_phone'];
        $id_jabatan = $data['jabatan_id'];
        $query = "INSERT INTO karyawan VALUES ('','$name', '$date', '$phone', '$id_jabatan')";
        return $this->executeAffected($query);
    }

    function updateKaryawan($id, $data)
    {
        $name = $data['karyawan_nama'];
        $date = $data['karyawan_date'];
        $phone = $data['karyawan_phone'];
        $id_jabatan = $data['jabatan_id'];

        $query = "UPDATE karyawan SET karyawan_id='$id', karyawan_nama='$name', karyawan_date='$date', karyawan_phone='$phone', jabatan_id='$id_jabatan' WHERE karyawan_id='$id';";

        return $this->executeAffected($query);
    }

    function deleteKaryawan($id)
    {
        $query = "DELETE FROM karyawan WHERE karyawan_id = '$id'";
        return $this->executeAffected($query);
    }


}