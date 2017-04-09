<form id="form_update_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?= $mTitle ?>
                <div id="ajaxLoadTM" class="pull-right" url="<?= TM_BASE_URL ?>"></div>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading center-block">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="TMAlert"></div>
<!--                        <input type="hidden" name="<? $this->security->get_csrf_token_name(); ?>" value="<? $this->security->get_csrf_hash(); ?>">-->
                        <input type="hidden" name="LIID" value="<?= isset($d->LIID) ? $d->LIID : NULL ?>">
                        <table class="table-details" align="center">
                            <tbody>
                                <tr>
                                    <th>Tên ngôn ngữ</th>
                                    <td>
                                        <input type="text" name="LVTitle" class="form-control" placeholder="Nhập tên ngôn ngữ" 
                                               value="<?= isset($d->LVTitle) ? $d->LVTitle : NULL ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mã ngôn ngữ</th>
                                    <td>
                                        <input type="text" name="LVLangCode" class="form-control" placeholder="Nhập mã ngôn ngữ" 
                                               value="<?= isset($d->LVLangCode) ? $d->LVLangCode : NULL ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mã Zip</th>
                                    <td>
                                        <input type="text" name="LIZipCode" class="form-control" placeholder="Nhập mã Zip" 
                                               value="<?= isset($d->LIZipCode) ? $d->LIZipCode : NULL ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Miêu tả</th>
                                    <td>
                                        <textarea name="LVDesc" class="form-control" placeholder="Nhập miêu tả"><?= isset($d->LVDesc) ? $d->LVDesc : NULL ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Trạng thái</th>
                                    <td class="fixCheck">
                                        <input id="flag" type="checkbox" name="LIFlag" value="1" <?= isset($d->LIFlag) && $d->LIFlag == '1' ? 'checked' : NULL ?>>
                                        <label for="flag">Hiển thị</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ảnh đại diện</th>
                                    <td>
                                        <div class="imgCheck img50">
                                            <img src="<?= isset($d->LVImages) && $d->LVImages != '/' ? TM_BASE_URL . $d->LVImages : NULL ?>" alt="<?= isset($d->LVTitle) ? $d->LVTitle : NULL ?>">
                                        </div>
                                        <input type="file" id="ImageFiles" name="ImageFiles">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" id="btnUpdate" name="btnUpdate" value="1" class="btn btn-primary">Cập nhât</button>
                        <a href="../" class="btn btn-default">Quay lại</a>
                    </div>
                </div>
            </div><!-- /.table-responsive -->
        </div> <!-- /.col-lg-12 -->
    </div><!-- /.panel -->
</form>
<script>
    $(function () {
        $("#form_update_modal").validate(
                {
                    rules: {
                        LVTitle: 'required',
                        LVLangCode: 'required',
                        LIZipCode: 'required'
                    },
                    messages: {
                        LVTitle: 'Vui lòng nhập tên ngôn ngữ',
                        LVLangCode: 'Vui lòng nhập mã ngôn ngữ',
                        LIZipCode: 'Vui lòng nhập mã zip'
                    },
                    success: function (e) {
                        $(e).ValidateSuccess();
                    },
                    highlight: function (e, r) {
                        $(e).ValidateError();
                    }
//                    submitHandler: function (e) {
//                        alert('submit')
//                    }
                });
        var validImg = $('#ImageFiles').ValidateFile({
            ext: 'gif|jpg|jpeg|png',
            messages: 'Sai định dạng file',
            imgLoad: '<?= TM_BASE_URL ?>assets/loading/load2.gif'});
        $('#btnUpdate').click(function (e) {
            if ($('#form_update_modal').valid() && validImg) {
                $('#form_update_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('update') ?>', reset: false});
            }
            return false;
        });
    })
</script>