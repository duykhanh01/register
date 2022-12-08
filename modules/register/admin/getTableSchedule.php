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



$id_query_schedule = $_POST['id_schedule'];
$time_start = $_POST['start'];
$time_end = $_POST['end'];

$sql        = "SELECT * FROM `nv4_vi_register_schedules` WHERE id='$id_query_schedule'";
$res        = $db->query($sql)->fetch();
$sche_id    = $res['id'];

//lay ra cac lesson co sche_id = $sche_id
$sql_get_lesson = "SELECT * FROM `nv4_vi_register_lessons` WHERE sche_id='$sche_id'";
$res_lessons        = $db->query($sql_get_lesson)->fetchAll();

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


function html1($thu, $date, $tiet, $mon, $ppct, $tenBd, $soHSV, $nhanXet, $xepLoai, $giaoVien,$sche_id )
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
        .'<button type="button" class="btn btn-success btn-add-lesson" number="'.$tiet.'" current-date="'.$date.'" lesson="'.$mon.'" schedule_id="'.$sche_id.'" teacher_id="'.$giaoVien.'"  data-toggle="modal" data-target="#exampleModal">'
        .'+'
        .'</button>'
        .'</td>'
        .'</tr>';
}

function html2($date,$tiet, $mon, $ppct, $tenBd, $soHSV, $nhanXet, $xepLoai, $giaoVien, $sche_id)
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
        .'<button type="button" class="btn btn-success btn-add-lesson" number="'.$tiet.'"  current-date="'.$date.'" lesson="'.$mon.'" schedule_id="'.$sche_id.'" teacher_id="'.$giaoVien.'"  data-toggle="modal" data-target="#exampleModal">'
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
        foreach($res_lessons as $l)
        {
            $time = strtotime($l['date']);
            $time = date('Y-m-d', $time);

            if($lesson == $l['number'] && $date == $time)
            {
                $meta = json_decode($l['meta'], true,512,JSON_UNESCAPED_UNICODE);
                $tiet     = $l['number'];
                $mon      = $meta['subject_name'];
                $ppct     = $l['subd_id'];
                $tenBd    = $meta['subject_detail_name'];
                $soHSV    = $l['absent_students'];
                $nhanXet  = $l['comment'];
                $xepLoai  = $l['point'];
                $giaoVien = $meta['teacher_name'];
            }
        }
        if ($lesson == 1) {
            $printHtml .= html1($thu, $date, $tiet, $mon, $ppct, $tenBd, $soHSV, $nhanXet, $xepLoai, $giaoVien, $sche_id);
            continue;
        }
        $printHtml .= html2($date,$tiet, $mon, $ppct, $tenBd, $soHSV, $nhanXet, $xepLoai, $giaoVien, $sche_id);
    }
}
echo $printHtml;


