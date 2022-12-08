<!-- BEGIN: main -->
<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <select name="year" class="form-control">
                <option value="0">Chọn năm học</option>
                <option value="1">2022-2023</option>
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <select name="grade" class="form-control">
                <option value="" selected="selected">Chọn khối</option>
                <option value="1">1</option>
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <select name="subject" class="form-control">
                <option value="" selected="selected">Chọn Môn</option>
                <option value="1">1</option>
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <input type="text" value="" autofocus="autofocus" maxlength="64" name="q" class="form-control" placeholder="Nhập tiết học">
        </div>
    </div>


    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <input type="submit" value="Tìm kiếm" class="btn btn-info">
            <a href="{URL_IMPORT}" class="btn btn-success">Nhập excel</a>

        </div>

    </div>

</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Năm học</th>
        <th scope="col">Khối</th>
        <th scope="col">Môn</th>
        <th scope="col">Tiết</th>
        <th scope="col">PPCT</th>
        <th scope="col">Chức năng</th>
    </tr>
    </thead>
    <tbody>
    <!-- BEGIN: loop -->
    <tr>
        <th scope="row">{DATA.key}</th>
        <td>{DATA.year}</td>
        <td>{DATA.grade}</td>
        <td>{DATA.sub_name}</td>
        <td>{DATA.number}</td>
        <td>{DATA.name}</td>
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
            <caption><em class="fa fa-file-text-o">&nbsp;</em>Thêm PPCT</caption>
            <tfoot>
            <tr>
                <td class="text-center" colspan="2"><input class="btn btn-primary frm-item" name="submit" type="submit" value="Thực hiện"/>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <tr>
                <td class="text-right"><strong>Năm học: </strong> <sup class="required">(*)</sup></td>
                <td>
                    <div class="form-group mb-0">
                        <select class="form-control w300" name="year" id="uid">
                            <option value="0">Chọn năm học</option>
                            {HTML_YEAR}
                        </select>
                    </div>
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
                <td class="text-right"><strong>Môn: </strong> <sup class="required">(*)</sup></td>
                <td>
                    <div class="form-group mb-0">
                        <select class="form-control w300" name="sub_id" id="uid">
                            <option value="0">Chọn môn</option>
                            {HTML_SUBJECT}
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-right w200"><strong>Tên PPCT: </strong> <sup class="required">(*)</sup></td>
                <td>
                    <div class="form-group mb-0"><input class="form-control frm-item w500" name="name" id="pseudonym" type="text"
                                                        value="{ROW.name}" maxlength="100" data-mess=""/></div>
                </td>
            </tr>
            <tr>
                <td class="text-right w200"><strong>Tiết: </strong> <sup class="required">(*)</sup></td>
                <td>
                    <div class="form-group mb-0"><input class="form-control frm-item w500" name="number" id="homeroom_teacher"
                                                        type="text" value="{ROW.number}" maxlength="100" data-mess=""/></div>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
<!-- END: main -->