<!-- BEGIN: main -->
<div class="">
    <div id="contentmod">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="form-group">
                    <select name="year" class="form-control">
                        <option value="0">Chọn năm học</option>
                        <option value="1">2022-2023</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <select name="grade" class="form-control">
                        <option value="" selected="selected">Chọn tuần</option>
                        <option value="1">Tuần 1 từ 01/12/2022 đến 07/12/2022</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="form-group">
                    <select name="subject" class="form-control">
                        <option value="" selected="selected">Chọn lớp</option>
                        <option value="1">12A1</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <a href="" class="btn btn-success">Tải excel</a>

                </div>

            </div>

        </div>
        <table class="table table-bordered">
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

            <tbody>
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
                        <select name="grade" class="form-control">
                            <option value="" selected="selected">Công nghệ</option>
                            <option value="1">Tiếng anh</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <lable>PPCT:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item" name="pseudonym" id="pseudonym" type="text" value=""
                                                        maxlength="100" data-mess=""></div>
                </div>
                <div class="mb-3">
                    <lable>Tên bài dạy:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item" name="pseudonym" id="pseudonym" type="text" value=""
                                                        maxlength="100" data-mess=""></div>
                </div>
                <div class="mb-3">
                    <lable>Số học sinh vắng:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item" name="pseudonym" id="pseudonym" type="text" value=""
                                                        maxlength="100" data-mess=""></div>
                </div>
                <div class="mb-3">
                    <lable>Nhận xét tiết học:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item" name="pseudonym" id="pseudonym" type="text-area"
                                                        value="" maxlength="100" data-mess=""></div>
                </div>
                <div class="mb-3">
                    <lable>Cho điểm xếp loại:</lable>
                    <div class="form-group mb-0"><input class="form-control frm-item" name="pseudonym" id="pseudonym" type="text" value=""
                                                        maxlength="100" data-mess=""></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" current-date="" lesson="" schedule_id="" teacher_id="" title="">Thực hiện
                </button>
            </div>
        </div>
    </div>
</div>


<!-- END: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/register.js"></script>
