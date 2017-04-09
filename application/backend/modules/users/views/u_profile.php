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
                    <input type="hidden" name="UVID" value="<?= Logged::UserID() ?>">
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('accountFirstName') ?></th>
                                <td class="form-group">
                                    <input name="UVProperty_names[]" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|accountFirstName') ?>" 
                                           value="<?= Logged::first_name() ?>">
                                </td>
                                <th><?= LKEY::GET('accountSurname') ?></th>
                                <td class="form-group">
                                    <input name="UVProperty_names[]" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|accountSurname') ?>" 
                                           value="<?= Logged::last_name() ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountEmail') ?></th>
                                <td class="form-group">
                                    <input name="UVEmail" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|accountEmail') ?>"
                                           value="<?= Logged::email() ?>">
                                </td>
                                <th><?= LKEY::GET('accountMobile') ?></th>
                                <td class="form-group">
                                    <input name="UVMobile" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|accountMobile') ?>"
                                           value="<?= Logged::mobile() ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountLockStatus') ?></th>
                                <td colspan="3" class="form-group middle">
                                    <?= Logged::locked() ? LKEY::GET('Locked') : LKEY::GET('UnLock') ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('rolesList') ?></th>
                                <td colspan="3" class="form-group">
                                    <div class="fix-check list-check">
                                        <?= TMLib::SplitToStr(Logged::roles()) ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('createDate') ?></th>
                                <td><?= Logged::create_date() ? Logged::create_date() : LKEY::GET('emptyField') ?></td>
                                <th><?= LKEY::GET('updateDate') ?></th>
                                <td><?= Logged::update_date() ? Logged::update_date() : LKEY::GET('emptyField') ?></td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountLastLogin') ?></th>
                                <td><?= Logged::last_login() ? Logged::last_login() : LKEY::GET('emptyField') ?></td>
                                <th><?= LKEY::GET('accountLastChangePass') ?></th>
                                <td><?= Logged::last_change_password() ? Logged::last_change_password() : LKEY::GET('emptyField') ?></td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountLockBy') ?></th>
                                <td><?= Logged::locked_by() ? Logged::locked_by() : LKEY::GET('emptyField') ?></td>
                                <th><?= LKEY::GET('accountLockDate') ?></th>
                                <td><?= Logged::locked_date() ? Logged::locked_date() : LKEY::GET('emptyField') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdate" name="btnUpdate" value="1" class="btn btn-primary">
                    <?= LKEY::GET('BtnUpdate') ?></button>
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
                $('#form_update_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('profile') ?>', reset: false});
            }
            return false;
        });
    })
</script>