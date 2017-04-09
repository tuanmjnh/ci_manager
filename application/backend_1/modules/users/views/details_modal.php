<form id="form_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
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
                    <input type="hidden" name="UVID" value="<?= isset($d->UVID) ? $d->UVID : NULL ?>">
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('accountName') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="UVAccount" readonly="true" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|accountName') ?>" 
                                           value="<?= isset($d->UVAccount) ? $d->UVAccount : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountFirstName') ?></th>
                                <?php $fullName = isset($d->UVProperty_names) ? $this->tmpluss->getArray($d->UVProperty_names) : NULL; ?>
                                <td class="form-group">
                                    <input name="UVProperty_names[]" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|accountFirstName') ?>" 
                                           value="<?= $fullName != NULL && count($fullName) > 0 ? $fullName[0] : NULL ?>">
                                </td>
                                <th><?= LKEY::GET('accountSurname') ?></th>
                                <td class="form-group">
                                    <input name="UVProperty_names[]" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|accountSurname') ?>" 
                                           value="<?= $fullName != NULL && count($fullName) > 1 ? $fullName[1] : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Email') ?></th>
                                <td class="form-group">
                                    <input name="UVEmail" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|Email') ?>"
                                           value="<?= isset($d->UVEmail) ? $d->UVEmail : NULL ?>">
                                </td>
                                <th><?= LKEY::GET('Mobile') ?></th>
                                <td class="form-group">
                                    <input name="UVMobile" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|Mobile') ?>"
                                           value="<?= isset($d->UVMobile) ? $d->UVMobile : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountLockStatus') ?></th>
                                <td colspan="3" class="form-group middle">
                                    <div class="fix-check">
                                        <label>
                                            <input id="flag" type="checkbox" name="UDLocked" value="0"
                                                   <?= isset($d->UDLocked) && $d->UDLocked == '0' ? 'checked' : NULL ?>>
                                                   <?= LKEY::GET('lock') ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('rolesList') ?></th>
                                <td colspan="3" class="form-group">
                                    <div class="fix-check list-check">
                                        <?php
                                        foreach ($this->mdl_roles->get_all() as $k => $v) {
                                            $checked = '';
                                            if (in_array($v->RVKey, $this->tmpluss->getArray($d->UVRoles)))
                                                $checked = 'checked="checked"';
                                            echo '<label><input type="checkbox" name="UVRoles[]" ' . $checked . ' value="' .
                                            $v->RVKey . '" id="' . $v->RVKey . '">' . $v->RVName . '</label>';
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Images') ?></th>
                                <td colspan="3" class="form-group">
                                    <div class="imgCheck">
                                        <?= isset($d->UVPicture) && $d->UVPicture != NULL ? '<img src="' . TM_BASE_URL . $d->UVPicture . '">' : NULL ?>
                                    </div>
                                    <input type="file" id="ImageFiles" name="ImageFiles">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('createDate') ?></th>
                                <td><?= isset($d->UDCDate) ? TMLib::FormatDate2($d->UDCDate) : LKEY::GET('emptyField') ?></td>
                                <th><?= LKEY::GET('updateDate') ?></th>
                                <td><?= isset($d->UDUDate) ? TMLib::FormatDate2($d->UDUDate) : LKEY::GET('emptyField') ?></td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountLastLogin') ?></th>
                                <td><?= isset($d->UDLastLogin) ? $d->UDLastLogin : LKEY::GET('emptyField') ?></td>
                                <th><?= LKEY::GET('accountLastChangePass') ?></th>
                                <td><?= isset($d->UDlastChangePass) ? $d->UDlastChangePass : LKEY::GET('emptyField') ?></td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('accountLockBy') ?></th>
                                <td><?= isset($d->UVLockedBy) ? $d->UVLockedBy : LKEY::GET('emptyField') ?></td>
                                <th><?= LKEY::GET('accountLockDate') ?></th>
                                <td><?= isset($d->UDLockedDate) ? $d->UDLockedDate : LKEY::GET('emptyField') ?></td>
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
        $("#form_modal").validate({
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
            if ($('#form_modal').valid() && validImg) {
                $('#form_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('update') ?>', reset: false});
            }
            return false;
        });
    })
</script>