<?php

/**
 * @Project REGISTER 1.X
 * @Author CHK (ngoduykhanh2001@gmail.com)
 * @Copyright (C) 2022 CHK. All rights reserved
 * @License GNU/GPL version 3.0
 * @Createdate Thu, 8 Dec 2022 08:45:51 GMT
 */
$subject = $_POST['subject'];
$subject_name = $_POST['subject_name'];
$subject_detail = $_POST['subject_detail']; //id ppct
$subject_detail_name = $_POST['subject_detail_name'];
$absent_students = $_POST['absent_students'];
$comment_lesson = $_POST['comment_lesson'];
$point_lesson = $_POST['point_lesson'];
$date = $_POST['date'];
$schedule_id = $_POST['schedule_id'];
$teacher_id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$number = $_POST['number'];
$meta = json_encode([
    'subject_name' =>$subject_name,
    'subject_detail_name' => $subject_detail_name,
    'teacher_name' => $teacher_name
    ], JSON_UNESCAPED_UNICODE);
$sql = "INSERT INTO `nv4_vi_register_lessons`(number , sub_id , subd_id , 	absent_students , comment , point , teacher_id , sche_id , date, meta)
    VALUES ('$number' , '$subject' , '$subject_detail' , '$absent_students' , '$comment_lesson' , '$point_lesson' , '$teacher_id' ,'$schedule_id' , '$date', '$meta')";
 $db->query($sql);
echo 1;
//$sth = $db->prepare($sql);
//$sth->bindParam(':number', $number, PDO::PARAM_INT);
//$sth->bindParam(':sub_id', $subject, PDO::PARAM_INT);
//$sth->bindParam(':subd_id', $subject_detail, PDO::PARAM_INT);
//$sth->bindParam(':absent_students', $absent_students, PDO::PARAM_INT);
//$sth->bindParam(':comment', $comment_lesson, PDO::PARAM_STR);
//$sth->bindParam(':point', $point_lesson, PDO::PARAM_INT);
//$sth->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
//$sth->bindParam(':sche_id', $scheledule_id, PDO::PARAM_INT);
//$sth->bindParam(':date', $date, PDO::PARAM_STR);


