<form id="form_update_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
<!--    <input type="hidden" name="<? $this->security->get_csrf_token_name(); ?>" value="<? $this->security->get_csrf_hash(); ?>">-->
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><?= isset($mTitle) ? $mTitle : NULL ?></h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="TMAlert"></div>
                    <input type="hidden" name="UVID" value="<?= isset($d->UVID) ? $d->UVID : NULL ?>">
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th>Status</th>
                                <td colspan="3" class="form-group">
                                    Updating.....
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
<!--                <button type="button" id="btnUpdate" name="btnUpdate" value="1" class="btn btn-primary">
                    <? LKEY::GET('BtnUpdate') ?></button>-->
                <button type="button" id="cancel-model" class="btn btn-default TMDT-Refresh" TMDT-Refresh=".TMDT" data-dismiss="modal">
                    <?= LKEY::GET('BtnCancel') ?></button>
            </div>
        </div>
    </div>
</form>
<script>
    $(function () {
        $("#form_update_modal").validate({
            rules: {
                UVEmail: {required: false, email: true},
                UVMobile: {required: false, digits: true},
                'UVRoles[]': 'required'
            },
            messages: {
                UVEmail: {email: '<?= LKEY::GET('msgEmailError') ?>'},
                UVMobile: {digits: '<?= LKEY::GET('msgMobileError') ?>'},
                'UVRoles[]': '<?= LKEY::GET('plsChoose|rolesType') ?>'
            },
            success: function (e) {
                $(e).ValidateSuccess();
            },
            highlight: function (e, r) {
                $(e).ValidateError({fixList: {name: 'UVRoles[]', parent: '#UVRoles'}});
            }
        });
        var validImg = $('#ImageFiles').ValidateFile({
            ext: 'gif|jpg|jpeg|png',
            messages: '<?= LKEY::GET('msgFileError') ?>',
            imgLoad: '<?= TM_BASE_URL ?>assets/loading/load2.gif',
            imgClass: 'img128'});
        $('#btnUpdate').click(function (e) {
            if ($('#form_update_modal').valid() && validImg) {
                $('#form_update_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('update') ?>', reset: false});
            }
            return false;
        });
    })
</script>