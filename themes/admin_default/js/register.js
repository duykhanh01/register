/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

$(document).ready(function(){
    $('.btn-add-lesson').click(function(){
        let date = $(this).attr('current-date');
        let lesson = $(this).attr('lesson');
        let scheledule_id = $(this).attr('schedule_id');
        let teacher_id = $(this).attr('teacher_id');
        let number = $(this).attr('number');
        $('.btn-action-submit').attr('current-date', date);
        $('.btn-action-submit').attr('lesson',lesson);
        $('.btn-action-submit').attr('schedule_id',scheledule_id);
        $('.btn-action-submit').attr('teacher_id',teacher_id);
        $('.btn-action-submit').attr('number',number);
    })
    $('.btn-action-submit').click(function(){
        let subject = $('.subject').val();
        let subject_name = $('.subject option:selected').text();
        let subject_detail = $('.subject_detail').val();
        let subject_detail_name = $('.subject_detail_name').val(); //ten phan phoi chuong triinh
        let absent_students = $('.absent_students').val();
        let comment_lesson = $('.comment_lesson').val();
        let point_lesson = $('.point_lesson').val();
        let date = $(this).attr('current-date');
        let schedule_id = $(this).attr('schedule_id');
        let teacher_id = $('.gv-info').attr('id-gv');
        let teacher_name = $('.gv-info').attr('ten-gv');
        let number = $(this).attr('number');
        $.ajax({
            type: 'POST',
            url : 'index.php?language=vi&nv=register&op=add_lesson',
            data: {
                'subject' : subject,
                'subject_name' : subject_name,
                'subject_detail' : subject_detail,
                'subject_detail_name' : subject_detail_name,
                'absent_students' : absent_students,
                'comment_lesson' : comment_lesson,
                'point_lesson' : point_lesson,
                'date' : date,
                'schedule_id' : schedule_id,
                'teacher_id' : teacher_id,
                'teacher_name' : teacher_name,
                'number' : number
            },
            success: function(data) {
                if (data){
                    window.location.reload();
                }
            }
        });

    })
   $('.subject_detail').keyup(function(){
       let id = $('.subject').val();
       let id_ppct = $(this).val();
       console.log(id_ppct);
       console.log(id);
       $.ajax({
           url: 'index.php?language=vi&nv=register&op=getSubjectDetail',
           type: 'POST',
           dataType: 'html',
           data: {
               'id_mh' : id,
               'id_ppct': id_ppct,
           }
       }).done(function(ketqua) {
           $('.subject_detail_name').val(ketqua);
       });
   })
});