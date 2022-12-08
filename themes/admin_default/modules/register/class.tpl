
<!-- BEGIN: main -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên lớp</th>
            <th scope="col">Khối</th>
            <th scope="col">Giáo viên chủ nhiệm</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <!-- BEGIN: loop -->
        <tr>
            <th scope="row">{DATA.key}</th>
            <td>{DATA.name}</td>
            <td>{DATA.grade}</td>
            <td>{DATA.teacher_name}</td>
            <td>
                <em class="fa fa-edit fa-lg">&nbsp;</em> <a href="{URL_EDIT}">Sửa</a>&nbsp;
                <em class="fa fa-trash fa-lg">&nbsp;</em> <a href="{URL_DELETE}">Xóa</a>&nbsp;
            </td>
        </tr>
        <!-- END: loop -->
        </tbody>
    </table>
    <div class="table-responsive">
        <form action="{FORM_ACTION}" method="post">

            <table id="edit" class="table table-striped table-bordered table-hover">
                <caption><em class="fa fa-file-text-o">&nbsp;</em>Thêm lớp</caption>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2"><input class="btn btn-primary frm-item" name="submit" type="submit" value="Thực hiện"/>
                    </td>
                </tr>
                </tfoot>
                <tbody>
                <tr>
                    <td class="text-right w200"><strong>Tên lớp: </strong> <sup class="required">(*)</sup></td>
                    <td>
                        <div class="form-group mb-0"><input class="form-control frm-item w500" name="name" id="pseudonym" type="text"
                                                            value="{ROW.name}" maxlength="100" data-mess=""/></div>
                    </td>
                </tr>
                <tr>
                    <td class="text-right"><strong>Khối: </strong> <sup class="required">(*)</sup></td>
                    <td>
                        <div class="form-group mb-0">
                            <select class="form-control w300" name="grade" id="uid">
                                <option value="0">Chọn khối</option>
                               {HTML_GRADE}
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-right w200"><strong>Giáo viên chủ nhiệm: </strong> <sup class="required">(*)</sup></td>
                    <td>
                        <div class="form-group mb-0"><input class="form-control frm-item w500" name="teacher_name" id="homeroom_teacher"
                                                            type="text" value="{ROW.teacher_name}" maxlength="100" data-mess=""/></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
</div>

<!-- END: main -->