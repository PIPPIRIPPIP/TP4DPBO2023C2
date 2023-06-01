<?php

class KaryawanView
{
    public function render($data)
    {
        $dataKaryawan = null;

        $no = 0;

        foreach ($data as $val) {
            $dataKaryawan .=
                '<tr>
                <th scope="row">' . ++$no . '</th>
                <td>' . $val['karyawan_nama'] . '</td>
                <td>' . $val['karyawan_date'] . '</td>
                <td>' . $val['karyawan_phone'] . '</td>
                <td>' . $val['jabatan_nama'] . '</td>
                <td style="font-size: 22px;"><a href="#" title="coba"></a>
                <a href="formKaryawan.php?id=' . $val['karyawan_id'] . '"><button type="button" class="btn btn-success text-white">Update</button></a>
                <a href="index.php?hapus=' . $val['karyawan_id'] . '"><button type="button" class="btn btn-danger">Delete</button></a>
                </td>
                </tr>';
        }
        $header = "<tr>
        <th> No </th>
                <th> Nama </th>
                <th> Tanggal Lahir </th>
                <th> No Telepon </th>
                <th> Jabatan </th>
                <th> Aksi </th>
                </tr>";


        $view = new Template("templates/index.html");

        $view->replace("HEADER", $header);
        $view->replace("PATH", "formKaryawan.php");
        $view->replace("JUDUL", "Karyawan");
        $view->replace("TABLE", $dataKaryawan);
        $view->write();
    }
}