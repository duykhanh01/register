

<!-- BEGIN: main -->

<div class="">
    <div id="contentmod">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="form-group">
                    <select name="year" class="form-control">
                        <option value="1">2022-2023</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <select name="grade" class="form-control grade">
                        {html_schedule}
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="form-group">
                    <select name="subject" class="form-control">
                        <option value="1">12A1</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <span href="" class="btn btn-success btn-export-excel">Tải excel</span>

                </div>

            </div>

        </div>
        <table class="table table-bordered table-schedule" id="tbl_exporttable_to_xls">
            <thead>
            <tr>
                <th scope="col">Thứ/Ngày</th>
                <th scope="col">Tiết</th>
                <th scope="col">Môn</th>
                <th scope="col">PPCT</th>
                <th scope="col">Tên bài dạy</th>
                <th scope="col">Số học sinh vắng</th>
                <th scope="col">Nhận xét tiết học</th>
                <th scope="col">Cho điểm xếp loại</th>
                <th scope="col">Giáo viên</th>
                <th scope="col">Chức năng</th>
            </tr>
            </thead>

            <tbody class="tbody-schedule">
            {html}
            </tbody>

        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nhập sổ đầu bài</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <lable>Môn:</lable>
                    <div class="form-group">
                        <select name="subject" class="form-control subject">
                            <option value="" selected="selected">Chọn môn</option>
                            {optionSubject}
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <lable>PPCT:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item subject_detail" name="subject_detail" id="pseudonym" type="text" value=""
                                                        maxlength="100" data-mess=""></div>
                </div>
                <div class="mb-3">
                    <lable>Tên bài dạy:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item subject_detail_name" name="subject_detail_name" id="pseudonym" type="text" value=""
                                                        maxlength="100" data-mess=""></div>
                </div>
                <div class="mb-3">
                    <lable>Số học sinh vắng:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item absent_students" name="absent_students" id="pseudonym" type="text" value=""
                                                        maxlength="100" data-mess=""></div>
                </div>
                <div class="mb-3">
                    <lable>Nhận xét tiết học:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item comment_lesson" name="comment_lesson" id="pseudonym" type="text-area"
                                                        value="" maxlength="100" data-mess=""></div>
                </div>
                <div class="mb-3">
                    <lable>Cho điểm xếp loại:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item point_lesson" name="point_lesson" id="pseudonym" type="text" value=""
                                                        maxlength="100" data-mess=""></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary btn-action-submit" number="" current-date="" lesson="" schedule_id="" teacher_id="" title="">Thực hiện
                </button>
            </div>
        </div>
    </div>
    <input type="hidden" name="" class="gv-info" ten-gv="{tenGV}" id-gv="{idGV}">
</div>

<!-- END: main -->
<script>


</script>