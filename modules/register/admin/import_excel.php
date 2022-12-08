<?php

/**
 * @Project REGISTER 1.X
 * @Author CHK (ngoduykhanh2001@gmail.com)
 * @Copyright (C) 2022 CHK. All rights reserved
 * @License GNU/GPL version 3.0
 * @Createdate Thu, 8 Dec 2022 08:45:51 GMT
 */

require_once NV_ROOTDIR . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['submit'])) {
    $year   = $_POST['year'] ?? '';
    $grade  = $_POST['grade'] ?? 0;
    $sub_id = $_POST['sub_id'] ?? 0;
    $fileName = $_FILES['import']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $arr_file = explode('.', $_FILES['import']['name']);
    $extension = end($arr_file);

    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
    $spreadsheet = $reader->load($_FILES['import']['tmp_name']);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    if (!empty($sheetData)) {
        for ($i=0; $i<count($sheetData); $i++) {
            $number  = $sheetData[$i][0];
            $name = $sheetData[$i][1];
            $meta  = ['sub_name'=>$name];
            $meta = json_encode($meta);
            $sql = 'INSERT INTO `nv4_vi_register_subject_detail`(`name` , grade, year, number, sub_id, meta) VALUES (:name , :grade, :year, :number , :sub_id , :meta)';
            $sth = $db->prepare($sql);
            $sth->bindParam(':name', $name, PDO::PARAM_STR);
            $sth->bindParam(':year', $year, PDO::PARAM_STR);
            $sth->bindParam(':grade', $grade, PDO::PARAM_INT);
            $sth->bindParam(':number', $number, PDO::PARAM_INT);
            $sth->bindParam(':sub_id', $sub_id, PDO::PARAM_INT);
            $sth->bindParam(':meta',$meta , PDO::PARAM_STR);
            $sth->execute();
        }
    }
    nv_redirect_location(NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&'.NV_NAME_VARIABLE.'='.$module_name.'&op='.$op);
    exit;

//    }
//    $meta   = ['sub_name' => $name];
//    $meta   = json_encode($meta);
//    $sql    = 'INSERT INTO `nv4_vi_register_subject_detail`(`name` , grade, year, number, sub_id, meta) VALUES (:name , :grade, :year, :number , :sub_id , :meta)';
//    $sth    = $db->prepare($sql);
//    $sth->bindParam(':name', $name, PDO::PARAM_STR);
//    $sth->bindParam(':year', $year, PDO::PARAM_STR);
//    $sth->bindParam(':grade', $grade, PDO::PARAM_INT);
//    $sth->bindParam(':number', $number, PDO::PARAM_INT);
//    $sth->bindParam(':sub_id', $sub_id, PDO::PARAM_INT);
//    $sth->bindParam(':meta', $meta, PDO::PARAM_STR);
//    $sth->execute();
//    nv_redirect_location(NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&'.NV_NAME_VARIABLE.'='.$module_name.'&op='.$op);
}