<?php

/**
 * @Project REGISTER 1.X
 * @Author CHK (ngoduykhanh2001@gmail.com)
 * @Copyright (C) 2022 CHK. All rights reserved
 * @License GNU/GPL version 3.0
 * @Createdate Thu, 8 Dec 2022 08:45:51 GMT
 */
$xtpl = new XTemplate('add_subject_detail.tpl', NV_ROOTDIR.'/themes/'.$global_config['module_theme'].'/modules/'.$module_file);

if (isset($_POST['submit'])) {
    $name   = $_POST['name'] ?? '';
    $year   = $_POST['year'] ?? '';
    $grade  = $_POST['grade'] ?? 0;
    $number = $_POST['number'] ?? 0;
    $sub_id = $_POST['sub_id'] ?? 0;
    $meta   = ['sub_name' => $name];
    $meta   = json_encode($meta);
    $sql    = 'INSERT INTO `nv4_vi_register_subject_detail`(`name` , grade, year, number, sub_id, meta) VALUES (:name , :grade, :year, :number , :sub_id , :meta)';
    $sth    = $db->prepare($sql);
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->bindParam(':year', $year, PDO::PARAM_STR);
    $sth->bindParam(':grade', $grade, PDO::PARAM_INT);
    $sth->bindParam(':number', $number, PDO::PARAM_INT);
    $sth->bindParam(':sub_id', $sub_id, PDO::PARAM_INT);
    $sth->bindParam(':meta', $meta, PDO::PARAM_STR);
    $sth->execute();
    nv_redirect_location(NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&'.NV_NAME_VARIABLE.'='.$module_name.'&op='.$op);
}


$htmlSelectGrade = '';
for ($i = 1; $i <= 12; $i++) {
    $selected = '';
    if ($i == ($row['grade'] ?? 0)) {
        $selected = 'selected';
    }
    $htmlSelectGrade .= '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
}

$htmlSelectYear = '';
for ($i = 2022; $i <= 2030; $i++) {
    $selected = '';
    if ($i == ($row['year'] ?? '')) {
        $selected = 'selected';
    }
    $htmlSelectYear .= '<option '.$selected.' value="'.$i.'-'.($i + 1).'">'.$i.'-'.($i + 1).'</option>';
}


$sqlSubjects       = 'SELECT * FROM `nv4_vi_register_subjects`';
$subjects          = $db->query($sqlSubjects)->fetchAll();
$htmlSelectSubject = '';
foreach ($subjects as $subject) {
    $selected = '';
    if ($subject['id'] == ($row['sub_id'] ?? 0)) {
        $selected = 'selected';
    }
    $htmlSelectSubject .= '<option '.$selected.' value="'.$subject['id'].'">'.$subject['name'].'</option>';
}

$xtpl->assign('HTML_GRADE', $htmlSelectGrade);
$xtpl->assign('HTML_YEAR', $htmlSelectYear);
$xtpl->assign('HTML_SUBJECT', $htmlSelectSubject);

$page_title   = 'Nhập PPCT';
$array_config = [];
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR.'/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR.'/includes/footer.php';