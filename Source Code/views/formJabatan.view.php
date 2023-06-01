<?php

class FormJabatanView
{
    public function renderAdd()
    {
        $dataForm = null;
        $dataForm = '<label for="jabatan_nama">Nama Jabatan:</label>
            <input type="text" id="jabatan_nama" name="jabatan_nama" required>

            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';

        $view = new Template("templates/formAdd.html");
        $view->replace("PATH", "formJabatan.php");
        $view->replace("JUDUL", "Jabatan");
        $view->replace("JENIS", "Add");
        $view->replace("FORM", $dataForm);
        $view->write();
    }

    public function renderUpdate($dataGroup)
    {
        $dataForm = null;
        $dataForm = '<label for="jabatan_nama">Nama Group:</label>
            <input type="hidden" name="id" value="' . $dataGroup[0]['jabatan_id'] . '" >
            <input type="text" id="jabatan_nama" name="jabatan_nama" value="' . $dataGroup[0]['jabatan_nama'] . '" required>

            <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit">Submit</button>';

        $view = new Template("templates/formAdd.html");
        $view->replace("PATH", "formJabatan.php");
        $view->replace("JUDUL", "Jabatan");
        $view->replace("JENIS", "Update");
        $view->replace("FORM", $dataForm);
        $view->write();
    }
}