<form id="form_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator" autocomplete="off">
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
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('accountPasswordOld') ?></th>
                                <td class="form-group">
                                    <input style="display: none;" type="password" />
                                    <input id="oldPassword" name="oldPassword" type="password" class="form-control" autocomplete="off" 
                                           placeholder="<?= LKEY::GET('Placeholder|accountPasswordOld') ?>" value="">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountPasswordNew') ?></th>
                                <td class="form-group">
                                    <input id="newPassword" name="newPassword" type="password" class="form-control" autocomplete="off" 
                                           placeholder="<?= LKEY::GET('Placeholder|accountPasswordNew') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountPasswordAgain') ?></th>
                                <td class="form-group">
                                    <input id="newPassworda" name="newPassworda" type="password" class="form-control" autocomplete="off"
                                           placeholder="<?= LKEY::GET('Placeholder|accountPasswordAgain') ?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-action" name="btn-action" value="1" class="btn btn-primary">
                    <?= LKEY::GET('BtnUpdate') ?></button>
                <button type="button" id="cancel-model" class="btn btn-default TMDT-Refresh" TMDT-Refresh=".TMDT" data-dismiss="modal">
                    <?= LKEY::GET('BtnCancel') ?></button>
            </div>
        </div>
    </div>
</form>
<script>
    $(function () {
        $('#form_modal').validate({
            rules: {
                oldPassword: {required: true, minlength: 6, maxlength: 32},
                newPassword: {required: true, minlength: 6, maxlength: 32},
                newPassworda: {required: true, minlength: 6, maxlength: 32, equalTo: '#newPassword'},
            },
            messages: {
                oldPassword: {
                    required: '<?= LKEY::GET('plsEnter|accountPasswordOld') ?>',
                    minlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPasswordOld') ?>', 6, 32]),
                    maxlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPasswordOld') ?>', 6, 32])},
                newPassword: {
                    required: '<?= LKEY::GET('plsEnter|accountPasswordNew') ?>',
                    minlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPasswordNew') ?>', 6, 32]),
                    maxlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPasswordNew') ?>', 6, 32])},
                newPassworda: {
                    required: '<?= LKEY::GET('plsEnter|accountPasswordAgain') ?>',
                    minlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPassword') ?>', 6, 32]),
                    maxlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPassword') ?>', 6, 32]),
                    equalTo: '<?= LKEY::GET('msgPasswordError') ?>'},
            },
            success: function (e) {
                $(e).ValidateSuccess();
            },
            highlight: function (e, r) {
                $(e).ValidateError();
            }
        });
        $('#btn-action').click(function (e) {
            if ($('#form_modal').valid()) {
                $('#form_modal').TMAjaxPost({url: '<?= TM_BASE_URL_CMS . '/users/change_password' ?>', reset: false});
            }
            return false;
        });
    })
</script>