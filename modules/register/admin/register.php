<?php

/**
 * @Project REGISTER 1.X
 * @Author CHK (ngoduykhanh2001@gmail.com)
 * @Copyright (C) 2022 CHK. All rights reserved
 * @License GNU/GPL version 3.0
 * @Createdate Thu, 8 Dec 2022 08:45:51 GMT
 */

if ( ! defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}
$page_title   = 'Quản lý sổ đầu bài';
$array_config = [];
$xtpl         = new XTemplate('register.tpl', NV_ROOTDIR.'/themes/'.$global_config['module_theme'].'/modules/'.$module_file);

$sql        = "SELECT * FROM `nv4_vi_register_schedules` WHERE id=1";
$res        = $db->query($sql)->fetch();
$sche_id    = $res['id'];
$start_date = $res['start'];
$end_date   = $res['end'];
$thu        = '';
$date       = '';
$tiet       = '';
$mon        = '';
$ppct       = '';
$tenBd      = '';
$soHSV      = '';
$nhanXet    = '';
$xepLoai    = '';
$giaoVien   = '';

function html1($thu, $date, $tiet, $mon, $ppct, $tenBd, $soHSV, $nhanXet, $xepLoai, $giaoVien)
{
    return '<tr>'
           .'<th scope="row" rowspan=5>'.$thu.' <br> Ngày '.$date.'</th>'
           .'<td>'.$tiet.'</td>'
           .'<td>'.$mon.'</td>'
           .'<td>'.$ppct.'</td>'
           .'<td>'.$tenBd.'</td>'
           .'<td>'.$soHSV.'</td>'
           .'<td>'.$nhanXet.'</td>'
           .'<td>'.$xepLoai.'</td>'
           .'<td>'.$giaoVien.'</td>'
           .'<td>'
           .'<button type="button" class="btn btn-success btn-add-lesson" current-date="" lesson="" schedule_id="" teacher_id=""  data-toggle="modal" data-target="#exampleModal">'
           .'+'
           .'</button>'
           .'</td>'
           .'</tr>';
}

function html2($tiet, $mon, $ppct, $tenBd, $soHSV, $nhanXet, $xepLoai, $giaoVien)
{
    return '<tr>'
           .'<td>'.$tiet.'</td>'
           .'<td>'.$mon.'</td>'
           .'<td>'.$ppct.'</td>'
           .'<td>'.$tenBd.'</td>'
           .'<td>'.$soHSV.'</td>'
           .'<td>'.$nhanXet.'</td>'
           .'<td>'.$xepLoai.'</td>'
           .'<td>'.$giaoVien.'</td>'
           .'<td>'
           .'<button type="button" class="btn btn-success btn-add-lesson" data-toggle="modal" data-target="#exampleModal">'
           .'+'
           .'</button>'
           .'</td>'
           .'</tr>';
}

$printHtml = '';

$start_date = date("Y-m-d", strtotime('-1 day', strtotime($start_date)));

for ($day = 2; $day <= 8; $day++) {
    $start_date = date("Y-m-d", strtotime('+1 day', strtotime($start_date)));
    $day != 8 ? $thu = 'Thứ '.$day : $thu = 'CN';
    $date = $start_date;
    for ($lesson = 1; $lesson <= 5; $lesson++) {
        $tiet     = $lesson;
        $mon      = '';
        $ppct     = '';
        $tenBd    = '';
        $soHSV    = '';
        $nhanXet  = '';
        $xepLoai  = '';
        $giaoVien = '';
        if ($lesson == 1) {
            $printHtml .= html1($thu, $date, $tiet, $mon, $ppct, $tenBd, $soHSV, $nhanXet, $xepLoai, $giaoVien);
            continue;
        }
        $printHtml .= html2($tiet, $mon, $ppct, $tenBd, $soHSV, $nhanXet, $xepLoai, $giaoVien);
    }
}
$xtpl->assign('html', $printHtml);


$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR.'/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR.'/includes/footer.php';
