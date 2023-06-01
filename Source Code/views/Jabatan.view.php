<?php

class JabatanView
{
    public function render($data)
    {
        $dataJabatan = null;

        $no = 0;

        foreach ($data as $val) {
            $dataJabatan .=
                '<tr>
            <th scope="row">' . ++$no . '</th>
            <td>' . $val['jabatan_nama'] . '</td>
            <td style="font-size: 22px;">
            <a href="formJabatan.php?id=' . $val['jabatan_id'] . '"><button type="button" class="btn btn-success text-white">Update</button></a>
            <a href="jabatan.php?hapus=' . $val['jabatan_id'] . '"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
            </tr>';
        }
        $header = "<tr>
            <th> No </th>
            <th> Nama Jabatan </th>
            <th> Aksi </th>
            </tr>";

        $view = new Template("templates/index.html");

        $view->replace("HEADER", $header);
        $view->replace("PATH", "formJabatan.php");
        $view->replace("JUDUL", "Jabatan");
        $view->replace("TABLE", $dataJabatan);
        $view->write();
    }
}