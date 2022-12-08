
<?php

/**
 * @Project REGISTER 1.X
 * @Author CHK (ngoduykhanh2001@gmail.com)
 * @Copyright (C) 2022 CHK. All rights reserved
 * @License GNU/GPL version 3.0
 * @Createdate Thu, 8 Dec 2022 08:45:51 GMT
 */
$xtpl = new XTemplate('subject_detail.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
// Lay du lieu
$action = NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&amp;'.NV_NAME_VARIABLE.'='.$module_name.'&amp;'.NV_OP_VARIABLE.'='.$op;
$sql  = 'SELECT * FROM `nv4_vi_register_subject_detail`';
if (isset($_GET['id'])){
    $sqlEdit  = 'SELECT * FROM `nv4_vi_register_subject_detail` where id='.$_GET['id'];
    $action.='&id='.$_GET['id'];
    $row = $db->query($sqlEdit)->fetch();
    $xtpl->assign('ROW', ($row ?? []));

} else{
}
$rows = $db->query($sql)->fetchAll();

if ( ! empty($rows ?? [])) {
    foreach ($rows as $key => $row) {
        $actionEdit = NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&amp;'.NV_NAME_VARIABLE.'='.$module_name.'&amp;'.NV_OP_VARIABLE.'='.$op.'&id='.$row['id'];
        $actionDelete = NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&amp;'.NV_NAME_VARIABLE.'='.$module_name.'&amp;'.NV_OP_VARIABLE.'='.$op.'&id_delete='.$row['id'];
        $row['key'] = $key+1;
        $xtpl->assign('DATA', $row);
        $xtpl->assign('URL_EDIT', $actionEdit);
        $xtpl->assign('URL_DELETE', $actionDelete);
        $xtpl->parse('main.loop');
    }
}

$xtpl->assign('FORM_ACTION', $action);

$xtpl->assign('DATA', $data);


if (isset($_POST['submit'])) {
    $name         = $_POST['name'] ?? '';
    $year         = $_POST['year'] ?? '';
    $grade         = $_POST['grade'] ?? 0;
    $number         = $_POST['number'] ?? 0;
    $sub_id         = $_POST['sub_id'] ?? 0;
    $meta  = ['sub_name'=>$name];
    $meta  =json_encode($meta);
    if ($_GET['id'] ?? 0) {
        $sql = "UPDATE `nv4_vi_register_subject_detail` SET `name`= :name , grade = :grade, year = :year, number= :number , sub_id = :sub_id, meta = :meta WHERE id=".$_GET['id'];
    } else {
        $sql = 'INSERT INTO `nv4_vi_register_subject_detail`(`name` , grade, year, number, sub_id, meta) VALUES (:name , :grade, :year, :number , :sub_id , :meta)';
    }

    $sth = $db->prepare($sql);
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->bindParam(':year', $year, PDO::PARAM_STR);
    $sth->bindParam(':grade', $grade, PDO::PARAM_INT);
    $sth->bindParam(':number', $number, PDO::PARAM_INT);
    $sth->bindParam(':sub_id', $sub_id, PDO::PARAM_INT);
    $sth->bindParam(':meta',$meta , PDO::PARAM_STR);
    $sth->execute();
    nv_redirect_location(NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&'.NV_NAME_VARIABLE.'='.$module_name.'&op='.$op);

}



// Xóa
if (isset($_GET['id_delete'])){
    $id = $_GET['id_delete'];
    $sqlDelete = 'DELETE FROM nv4_vi_register_subject_detail WHERE id='.$id;
    $row = $db->query($sqlDelete);
    nv_redirect_location(NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&'.NV_NAME_VARIABLE.'='.$module_name.'&op='.$op);
}



if (isset($_GET['id'])){
    $sqlEdit  = 'SELECT * FROM `nv4_vi_register_subject_detail` where id='.$_GET['id'];
    $action.='&id='.$_GET['id'];
    $row = $db->query($sqlEdit)->fetch();
    $htmlSelectGrade = '';
    for($i = 1; $i<=12; $i++){
        $selected = '';
        if ($i == ($row['grade'] ?? 0)){
            $selected = 'selected';
        }
        $htmlSelectGrade.='<option '.$selected.' value="'.$i.'">'.$i.'</option>';
    }

    $htmlSelectYear = '';
    for($i = 2022; $i<=2030; $i++){
        $selected = '';
        if ($i == ($row['year'] ?? '')){
            $selected = 'selected';
        }
        $htmlSelectYear.='<option '.$selected.' value="'.$i .'-'.($i + 1).'">'.$i .'-'.($i + 1).'</option>';
    }


    $sqlSubjects  = 'SELECT * FROM `nv4_vi_register_subjects`';
    $subjects = $db->query($sqlSubjects)->fetchAll();
    $htmlSelectSubject = '';
    foreach($subjects as $subject){
        $selected = '';
        if ($subject['id'] == ($row['sub_id'] ?? 0)){
            $selected = 'selected';
        }
        $htmlSelectSubject.='<option '.$selected.' value="'.$subject['id'].'">'.$subject['name'].'</option>';
    }

    $xtpl->assign('ROW', ($row ?? []));
    $xtpl->assign('HTML_GRADE', $htmlSelectGrade);
    $xtpl->assign('HTML_YEAR', $htmlSelectYear);
    $xtpl->assign('HTML_SUBJECT', $htmlSelectSubject);

} else{
    $htmlSelectGrade = '';
    for($i = 1; $i<=12; $i++){
        $selected = '';
        if ($i == ($row['grade'] ?? 0)){
            $selected = 'selected';
        }
        $htmlSelectGrade.='<option '.$selected.' value="'.$i.'">'.$i.'</option>';
    }

    $htmlSelectYear = '';
    for($i = 2022; $i<=2030; $i++){
        $selected = '';
        if ($i == ($row['year'] ?? '')){
            $selected = 'selected';
        }
        $htmlSelectYear.='<option '.$selected.' value="'.$i .'-'.($i + 1).'">'.$i .'-'.($i + 1).'</option>';
    }


    $sqlSubjects  = 'SELECT * FROM `nv4_vi_register_subjects`';
    $subjects = $db->query($sqlSubjects)->fetchAll();
    $htmlSelectSubject = '';
    foreach($subjects as $subject){
        $selected = '';
        if ($subject['id'] == ($row['sub_id'] ?? 0)){
            $selected = 'selected';
        }
        $htmlSelectSubject.='<option '.$selected.' value="'.$subject['id'].'">'.$subject['name'].'</option>';
    }

    $xtpl->assign('HTML_GRADE', $htmlSelectGrade);
    $xtpl->assign('HTML_YEAR', $htmlSelectYear);
    $xtpl->assign('HTML_SUBJECT', $htmlSelectSubject);
}
$xtpl->assign('URL_IMPORT', NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&'.NV_NAME_VARIABLE.'='.$module_name.'&op='.'add_subject_detail');
$page_title = 'Quản lý PPCT';
$array_config = [];
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';