<?php

/**
 * @Project REGISTER 1.X
 * @Author CHK (ngoduykhanh2001@gmail.com)
 * @Copyright (C) 2022 CHK. All rights reserved
 * @License GNU/GPL version 3.0
 * @Createdate Thu, 8 Dec 2022 08:45:51 GMT
 */
$idMH = $_POST['id_mh'];
$idPPCT = $_POST['id_ppct'];
$sql = "SELECT * FROM `nv4_vi_register_subject_detail` WHERE sub_id = '$idMH' and id = '$idPPCT'";
$arrSubjectDetail = $db->query($sql)->fetch();
echo $arrSubjectDetail['name'] ?? '';
