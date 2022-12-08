<!-- BEGIN: main -->
<div id="users">
    <div class="container">
        <form action="{URL_SUBMIT}" method="post" enctype="multipart/form-data">
            <div class="form-group ">
                <select class="form-control " name="year" id="uid">
                    <option value="0">Chọn năm học</option>
                    {HTML_YEAR}
                </select>
            </div>
            <div class="form-group ">
                <select class="form-control " name="grade" id="uid">
                    <option value="0">Chọn khối</option>
                    {HTML_GRADE}
                </select>
            </div>
            <div class="form-group ">
                <select class="form-control " name="sub_id" id="uid">
                    <option value="0">Chọn môn</option>
                    {HTML_SUBJECT}
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Chọn file</label>
                <input type="file" name="import" class="form-control" />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>

</div>
<!-- END: main -->