<form id="form_update_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
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
                    <input type="hidden" name="MBVID" value="<?= isset($d->MBVID) ? $d->MBVID : NULL ?>">
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('membersName') ?></th>
                                <td class="form-group">
                                    <input name="MBVPropertyNames" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|membersName') ?>" 
                                           value="<?= isset($d->MBVPropertyNames) ? $d->MBVPropertyNames : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Email') ?></th>
                                <td class="form-group">
                                    <input name="MBVEmail" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|Email') ?>"
                                           value="<?= isset($d->MBVEmail) ? $d->MBVEmail : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Mobile') ?></th>
                                <td class="form-group">
                                    <input name="MBVMobile" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|Mobile') ?>"
                                           value="<?= isset($d->MBVMobile) ? $d->MBVMobile : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('membersCMND') ?></th>
                                <td class="form-group">
                                    <input name="MBIPersonId" type="text" class="form-control" maxlength="9" 
                                           placeholder="<?= LKEY::GET('Placeholder|membersCMND') ?>"
                                           value="<?= isset($d->MBIPersonId) ? $d->MBIPersonId : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('membersType') ?></th>
                                <td colspan="3" class="form-group middle">
                                    <div id="MBVPlus" class="fix-check list-check">
                                        <div class="error-box">
                                            <?php
                                            foreach ($this->mdl_membersType->get_order(1) as $row) {
                                                $check = '';
                                                if ($row->GUID == $d->MBVPlus)
                                                    $check = 'checked';
                                                echo '<label><input type="radio" name="MBVPlus" value="' . $row->GUID . '" ' . $check . '>' . $row->GVTitle . '</label>';
                                            }
                                            ?>
                                        </div>
                                        <label for="MBVPlus" class="error"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Options') ?></th>
                                <td class="form-group">
                                    <div class="fix-check">
                                        <label>
                                            <input id="flag" type="checkbox" name="MBIFlag" value="1" <?= isset($d->MBIFlag) && $d->MBIFlag == '1' ? 'checked' : NULL ?>>
                                            <?= LKEY::GET('Show') ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Address') ?></th>
                                <td class="form-group">
                                    <textarea name="MBVAddress" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Address') ?>"
                                              ><?= isset($d->MBVAddress) ? $d->MBVAddress : NULL ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Description') ?></th>
                                <td class="form-group">
                                    <textarea name="MBVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Description') ?>"
                                              ><?= isset($d->MBVDesc) ? $d->MBVDesc : NULL ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Images') ?></th>
                                <td class="form-group">
                                    <div class="imgCheck">
                                        <img src="<?= isset($d->MBVPicture) && $d->MBVPicture != '/' ? TM_BASE_URL . $d->MBVPicture : NULL ?>" 
                                             alt="<?= isset($d->MBVPropertyNames) ? $d->MBVPropertyNames : NULL ?>">
                                    </div>
                                    <input type="file" id="ImageFiles" name="ImageFiles">
                                </td>
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
        $("#form_update_modal").validate(
                {
                    rules: {
                        MBVPropertyNames: {required: true},
                        MBVEmail: {required: false, email: true},
                        MBVMobile: {required: false, digits: true},
                        MBIPersonId: {required: false, digits: true, minlength: 9, maxlength: 9},
                    },
                    messages: {
                        MBVPropertyNames: {required: '<?= LKEY::GET('plsEnter|membersName') ?>'},
                        MBVEmail: {email: '<?= LKEY::GET('msgEmailError') ?>'},
                        MBVMobile: {digits: '<?= LKEY::GET('msgMobileError') ?>'},
                        MBIPersonId: {
                            digits: '<?= LKEY::GET('msgPersonID') ?>',
                            minlength: '<?= LKEY::GET('msgPersonID') ?>',
                            maxlength: '<?= LKEY::GET('msgPersonID') ?>'
                        }
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
            messages: '<?= LKEY::GET('msgFileError') ?>',
            imgLoad: '<?= TM_BASE_URL ?>assets/loading/load2.gif'});
        $('#btnUpdate').click(function (e) {
            if ($('#form_update_modal').valid() && validImg) {
                $('#form_update_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('update') ?>', reset: false});
            }
            return false;
        });
    })
</script>