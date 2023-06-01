<?php

class FormKaryawanView
{
    public function renderAdd($data)
    {
        // mengambil data jabatan untuk pilihan
        $dataOption = '<option value="">Pilih Jabatan</option>';
        foreach ($data as $temp) {
            $dataOption .= '<option value="' . $temp['jabatan_id'] . '">' . $temp['jabatan_nama'] . '</option>';
        }
        
        $dataForm = null;
        $dataForm = '<label for="karyawan_nama">Nama:</label>
            <input type="text" id="karyawan_nama" name="karyawan_nama" required>

            <label for="jabatan_id">Jabatan:</label>
            <select id="jabatan_id" name="jabatan_id" required>' . $dataOption .
            '</select>

            <label for="karyawan_date">Tanggal Lahir:</label>
            <input type="date" id="karyawan_date" name="karyawan_date" required>

            <label for="karyawan_phone">Nomor Telepon:</label>
            <input type="text" id="phone" name="karyawan_phone" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';



        $view = new Template("templates/formAdd.html");
        $view->replace("PATH", "formKaryawan.php");
        $view->replace("JUDUL", "Karyawan");
        $view->replace("JENIS", "Add");
        $view->replace("FORM", $dataForm);
        $view->write();
    }

    public function renderUpdate($dataGroup, $dataMember)
    {
        // mengambil data jabatan untuk pilihan
        $dataOption = null;
        foreach ($dataGroup as $temp) {
            if ($temp['jabatan_id'] == $dataMember[0]['jabatan_id']) {
                $dataOption .= '<option value="' . $temp['jabatan_id'] . '" selected>' . $temp['jabatan_nama'] . '</option>';
            } else {
                $dataOption .= '<option value="' . $temp['jabatan_id'] . '">' . $temp['jabatan_nama'] . '</option>';
            }
        }

        $dataForm = null;
        $dataForm = '<label for="karyawan_nama">Nama:</label>
            <input type="hidden" name="id" value="' . $dataMember[0]['karyawan_id'] . '" >
            <input type="text" id="karyawan_nama" name="karyawan_nama" value="' . $dataMember[0]['karyawan_nama'] . '" required>

            <label for="jabatan_id">ID Group:</label>
            <select id="jabatan_id" name="jabatan_id" required>' . $dataOption .
            '</select>

            <label for="karyawan_date">Join Date:</label>
            <input type="date" id="karyawan_date" name="karyawan_date"  value="' . $dataMember[0]['karyawan_date'] . '" required>

            <label for="karyawan_phone">Phone:</label>
            <input type="text" id="karyawan_phone" name="karyawan_phone"  value="' . $dataMember[0]['karyawan_phone'] . '" required>
            
            
            <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit">Submit</button>';

        $view = new Template("templates/formAdd.html");
        $view->replace("PATH", "formKaryawan.php");
        $view->replace("JUDUL", "Karyawan");
        $view->replace("JENIS", "Update");
        $view->replace("FORM", $dataForm);
        $view->write();
    }
}