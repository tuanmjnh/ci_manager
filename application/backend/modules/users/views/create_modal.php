<form id="form_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator" autocomplete="off">
<!--    <input type="hidden" name="<? $this->security->get_csrf_token_name(); ?>" value="<? $this->security->get_csrf_hash(); ?>">-->
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="close-modal" class="close TMDT-Refresh" TMDT-Refresh=".TMDT" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><?= isset($mTitle) ? $mTitle : NULL ?></h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="TMAlert"></div>
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('accountName') ?></th>
                                <td colspan="3" class="form-group">
                                    <input style="display: none;" type="password" />
                                    <input name="UVAccount" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|accountName') ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountPassword') ?></th>
                                <td colspan="3" class="form-group">
                                    <input id="UVPassword" name="UVPassword" type="password" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|accountPassword') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountPasswordAgain') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="UVPassworda" type="password" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|accountPasswordAgain') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountFirstName') ?></th>
                                <td class="form-group">
                                    <input name="UVProperty_names[]" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|accountFirstName') ?>">
                                </td>
                                <th><?= LKEY::GET('accountSurname') ?></th>
                                <td class="form-group">
                                    <input name="UVProperty_names[]" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|accountSurname') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Email') ?></th>
                                <td class="form-group">
                                    <input name="UVEmail" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|Email') ?>">
                                </td>
                                <th><?= LKEY::GET('Mobile') ?></th>
                                <td class="form-group">
                                    <input name="UVMobile" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|Mobile') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountLockStatus') ?></th>
                                <td colspan="3" class="form-group middle">
                                    <div class="fix-check">
                                        <label>
                                            <input id="flag" type="checkbox" name="UDLocked" value="0">
                                            <?= LKEY::GET('lock') ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('rolesList') ?></th>
                                <td colspan="3" class="form-group middle">
                                    <div id="UVRoles" class="fix-check list-check">
                                        <div class="error-box">
                                            <?php
                                            foreach ($this->mdl_roles->get_all() as $k => $v) {
                                                echo '<label><input type="checkbox" name="UVRoles[]" value="' .
                                                $v->RVKey . '" id="' . $v->RVKey . '">' . $v->RVName . '</label>';
                                            }
                                            ?>
                                        </div>
                                        <label for="UVRoles[]" class="error"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Images') ?></th>
                                <td colspan="3" class="form-group">
                                    <input id="ImageFiles" name="ImageFiles" type="file">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="addNew" name="addNew" value="1" class="btn btn-primary">
                    <?= LKEY::GET('BtnCreate') ?></button>
                <button type="button" id="cancel-model" class="btn btn-default TMDT-Refresh" TMDT-Refresh=".TMDT" data-dismiss="modal">
                    <?= LKEY::GET('BtnCancel') ?></button>
            </div>
        </div>
    </div>
</form>
<script>
    $(function () {
        $("#form_modal").validate({
            rules: {
                UVAccount: {required: true, minlength: 4, maxlength: 32, alpha_numeric: true},
                UVPassword: {required: true, minlength: 4, maxlength: 32},
                UVPassworda: {required: true, minlength: 4, maxlength: 32, equalTo: '#UVPassword'},
                UVEmail: {required: false, email: true},
                UVMobile: {required: false, digits: true},
                'UVRoles[]': 'required'
            },
            messages: {
                UVAccount: {
                    required: '<?= LKEY::GET('plsEnter|accountName') ?>',
                    minlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountName') ?>', 4, 32]),
                    maxlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountName') ?>', 4, 32]),
                    alpha_numeric: '<?= LKEY::GET('msgAlphaNumericError') ?>'
                            .StringFormat('<?= LKEY::GET('accountName') ?>')
                },
                UVPassword: {
                    required: '<?= LKEY::GET('plsEnter|accountPassword') ?>',
                    minlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPassword') ?>', 4, 32]),
                    maxlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPassword') ?>', 4, 32])},
                UVPassworda: {
                    required: '<?= LKEY::GET('plsEnter|accountPasswordAgain') ?>',
                    minlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPassword') ?>', 4, 32]),
                    maxlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                            .StringFormat(['<?= LKEY::GET('accountPassword') ?>', 4, 32]),
                    equalTo: '<?= LKEY::GET('msgPasswordError') ?>'},
                UVEmail: {email: '<?= LKEY::GET('msgEmailError') ?>'},
                UVMobile: {digits: '<?= LKEY::GET('msgMobileError') ?>'},
                'UVRoles[]': '<?= LKEY::GET('plsChoose|rolesType') ?>'
            },
            success: function (e) {
                $(e).ValidateSuccess({remove: '.img-tmp'})
            },
            highlight: function (e, r) {
                $(e).ValidateError({fixList: {name: 'UVRoles[]', parent: '#UVRoles'}});
            }
        });
        var validImg = $('#ImageFiles').ValidateFile({
            ext: 'gif|jpg|jpeg|png',
            messages: '<?= LKEY::GET('msgFileError') ?>',
            imgLoad: '<?php TM_BASE_URL . 'assets/loading/load1.gif' ?>',
            imgClass: 'img128'});
        $('#addNew').click(function (e) {
            if ($('#form_modal').valid() && validImg) {
                $('#form_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('insert') ?>'});
            }
            return false;
        });
    });
</script>