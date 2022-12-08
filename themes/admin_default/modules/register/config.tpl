<!-- BEGIN: main -->
<div id="users">
    <div class="container">
        <form action="{FORM_ACTION}" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sở</label>
                <input type="text" class="form-control" name="s_name" value="{DATA.s_name}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên phòng</label>
                <input type="text" class="form-control" name="p_name" value="{DATA.p_name}" id="exampleInputPassword1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên trường</label>
                <input type="text" class="form-control" name="t_name" value="{DATA.t_name}" id="exampleInputPassword1" placeholder="">
            </div>
            <input type="submit" name="save"  class="btn btn-primary" value="Lưu">
        </form>
    </div>

</div>

<!-- END: main -->