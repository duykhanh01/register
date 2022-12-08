<?php

/**
 * @Project REGISTER 1.X
 * @Author CHK (ngoduykhanh2001@gmail.com)
 * @Copyright (C) 2022 CHK. All rights reserved
 * @License GNU/GPL version 3.0
 * @Createdate Thu, 8 Dec 2022 23:45:51 GMT
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$xtpl = new XTemplate('config.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
 //Lay du lieu
$sql = 'SELECT * FROM `nv4_vi_register_units`';
$row = $db->query($sql)->fetch();
$id = $row['id'] ?? '';
$data = [];

if ($id){
    $data = $row;
    $action = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op.'&id='.$id;
}
$action = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
$xtpl->assign('DATA', $data);
$xtpl->assign('FORM_ACTION', $action);

// Update hoặc insert dữ liệu

if (isset($_POST['save'])){
    $s_name = $_POST['s_name'] ?? '';
    $p_name = $_POST['p_name'] ?? '';
    $t_name = $_POST['t_name'] ?? '';
    if ($id){
        $sql = "UPDATE `nv4_vi_register_units` SET `s_name`= :s_name,`p_name`= :p_name,`t_name`= :t_name WHERE id=".$id;
    } else{
        $sql= 'INSERT INTO `nv4_vi_register_units`(`s_name`, `p_name`, `t_name`) VALUES (:s_name, :p_name, :t_name)';
    }

    $sth = $db->prepare($sql);
    $sth->bindParam(':s_name', $s_name, PDO::PARAM_STR);
    $sth->bindParam(':p_name', $p_name, PDO::PARAM_STR);
    $sth->bindParam(':t_name', $t_name, PDO::PARAM_STR);
    $sth->execute();
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name.'&op='.$op);
}
$page_title = $lang_module['config'];

$array_config = [];
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
