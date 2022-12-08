<?php

/**
 * @Project REGISTER 1.X
 * @Author CHK (ngoduykhanh2001@gmail.com)
 * @Copyright (C) 2022 CHK. All rights reserved
 * @License GNU/GPL version 3.0
 * @Createdate Thu, 8 Dec 2022 08:45:51 GMT
 */

$page_title = 'Quản lý môn học';

$xtpl = new XTemplate('subject.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
// Lay du lieu
$action = NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&amp;'.NV_NAME_VARIABLE.'='.$module_name.'&amp;'.NV_OP_VARIABLE.'='.$op;
$sql  = 'SELECT * FROM `nv4_vi_register_subjects`';
if (isset($_GET['id'])){
    $sqlEdit  = 'SELECT * FROM `nv4_vi_register_subjects` where id='.$_GET['id'];
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
    if ($_GET['id'] ?? 0) {
        $sql = "UPDATE `nv4_vi_register_subjects` SET `name`= :name WHERE id=".$_GET['id'];
    } else {
        $sql = 'INSERT INTO `nv4_vi_register_subjects`(`name`) VALUES (:name)';
    }

    $sth = $db->prepare($sql);
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->execute();
    nv_redirect_location(NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&'.NV_NAME_VARIABLE.'='.$module_name.'&op='.$op);
}



// Xóa
if (isset($_GET['id_delete'])){
    $id = $_GET['id_delete'];
    $sqlDelete = 'DELETE FROM nv4_vi_register_subjects WHERE id='.$id;
    $row = $db->query($sqlDelete);
    nv_redirect_location(NV_BASE_ADMINURL.'index.php?'.NV_LANG_VARIABLE.'='.NV_LANG_DATA.'&'.NV_NAME_VARIABLE.'='.$module_name.'&op='.$op);
}

$array_config = [];
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';