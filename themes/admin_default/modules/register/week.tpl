<!-- BEGIN: main -->
<div class="">
    <div>
        <div>
            <span>Chọn năm</span>
            <div class="form-group">
                <select name="year" class="form-control w200">
                    <option value="1">2022-2023</option>
                </select>
            </div>
        </div>
    </div>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Năm học</th>
        <th scope="col">Tên tuần</th>
        <th scope="col">Từ</th>
        <th scope="col">Đến</th>
        <th scope="col">Khóa</th>
        <th scope="col">Chức năng</th>
    </tr>
    </thead>
    <tbody>
    <!-- BEGIN: loop -->

    <tr>
        <th scope="row">{DATA.key}</th>
        <td>{DATA.year}</td>
        <td>{DATA.name}</td>
        <td>{DATA.start}</td>
        <td>{DATA.end}</td>
        <td>Có</td>
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
        <caption><em class="fa fa-file-text-o">&nbsp;</em>Thêm Tuần</caption>
        <tbody>
        <tr>
            <td class="text-right w200"><strong>Chọn năm </strong> <sup class="required">(*)</sup></td>
            <td><div class="form-group mb-0">
                    <select name="year" class="form-control">
                        <option value="0">Chọn năm học</option>
                        {HTML_YEAR}
                    </select>
            </td>
        </tr>
        <tr>
            <td class="text-right w200"><strong>Tên tuần </strong> <sup class="required">(*)</sup></td>
            <td><div class="form-group mb-0">
                    <input type="text" class="form-control" value="{ROW.name}" name="name">
            </td>
        </tr>
        <tr>
            <td class="text-right w200"><strong>Từ ngày </strong> <sup class="required">(*)</sup></td>
            <td><div class="form-group mb-0">
                    <input type="date" class="form-control" value="{ROW.start}" name="start">
            </td>
        </tr>
        <tr>
            <td class="text-right w200"><strong>Đến ngày </strong> <sup class="required">(*)</sup></td>
            <td><div class="form-group mb-0">
                    <input type="date" class="form-control" value="{ROW.end}" name="end">
            </td>
        </tr>
        <tr>
            <td class="text-right w200"><strong>Trạng thái </strong> <sup class="required">(*)</sup></td>
            <td><div class="form-group mb-0">
                    <select name="status" class="form-control">
                        {HTML_STATUS}
                    </select>
            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td class="text-center" colspan="2"><input class="btn btn-primary frm-item" name="submit" type="submit" value="Thêm" /></td>
        </tr>
        </tfoot>
    </table>
    </form>
</div>
<!-- END: main -->