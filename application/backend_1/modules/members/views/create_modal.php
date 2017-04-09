<form id="form_create_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
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
                                <th><?= LKEY::GET('membersName') ?></th>
                                <td class="form-group">
                                    <input name="MBVPropertyNames" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|membersName') ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Email') ?></th>
                                <td class="form-group">
                                    <input name="MBVEmail" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|Email') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Mobile') ?></th>
                                <td class="form-group">
                                    <input name="MBVMobile" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|Mobile') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('membersCMND') ?></th>
                                <td class="form-group">
                                    <input name="MBIPersonId" type="text" class="form-control" maxlength="9" 
                                           placeholder="<?= LKEY::GET('Placeholder|membersCMND') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('membersType') ?></th>
                                <td colspan="3" class="form-group middle">
                                    <div id="MBVPlus" class="fix-check list-check">
                                        <div class="error-box">
                                            <?php
                                            $check = 'checked';
                                            foreach ($this->mdl_membersType->get_order(1) as $row) {
                                                echo '<label><input type="radio" name="MBVPlus" value="' . $row->GUID . '" ' . $check . '>' . $row->GVTitle . '</label>';
                                                $check = '';
                                            }
                                            ?>
                                        </div>
                                        <label for="MBVPlus" class="error"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Address') ?></th>
                                <td class="form-group">
                                    <textarea name="MBVAddress" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Address') ?>"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Description') ?></th>
                                <td class="form-group">
                                    <textarea name="MBVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Description') ?>"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Images') ?></th>
                                <td class="form-group"><input id="ImageFiles" name="ImageFiles" type="file"> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                ?>
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
        $("#form_create_modal").validate({
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
                $(e).ValidateSuccess({remove: '.img-tmp'})
            },
            highlight: function (e, r) {
                $(e).ValidateError()
            }
        });
        var validImg = $('#ImageFiles').ValidateFile({
            ext: 'gif|jpg|jpeg|png',
            messages: '<?= LKEY::GET('msgFileError') ?>',
            imgLoad: '<?php TM_BASE_URL . 'assets/loading/load1.gif' ?>'});
        $('#addNew').click(function (e) {
            if ($('#form_create_modal').valid() && validImg) {
                $('#form_create_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('insert') ?>'});
            }
            return false;
        });
    });
</script>