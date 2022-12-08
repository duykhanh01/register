<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN')) {
    exit('Stop!!!');
}

define('NV_IS_FILE_ADMIN', true);

if (defined('NV_IS_SPADMIN')) {
    $allow_func[] = 'config';
    $allow_func[] = 'class';
    $allow_func[] = 'subject';
    $allow_func[] = 'subject_detail';
    $allow_func[] = 'week';
    $allow_func[] = 'register';
    $allow_func[] = 'add_lesson';
    $allow_func[] = 'getSubjectDetail';
    $allow_func[] = 'add_subject_detail';
    $allow_func[] = 'getTableSchedule';
    $allow_func[] = 'import_excel';
}

