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
                                <th><?= LKEY::GET('languageName') ?></th>
                                <td class="form-group">
                                    <input name="LVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|languageName') ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('languageCode') ?></th>
                                <td class="form-group">
                                    <input name="LVLangCode" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|languageCode') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('languageISOCode') ?></th>
                                <td class="form-group">
                                    <input name="LVISOCode" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|languageISOCode') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('languageCountryCode') ?></th>
                                <td class="form-group">
                                    <input name="LVCountryCode" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|languageCountryCode') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Order') ?></th>
                                <td class="form-group"><div class="row col-md-3">
                                        <input name="LIOrder" type="text"  class="form-control" value="0" 
                                               placeholder="<?= LKEY::GET('Placeholder|Order') ?>"></div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Details') ?></th>
                                <td class="form-group">
                                    <textarea name="LVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Details') ?>"></textarea>
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
                LVTitle: 'required',
                LVLangCode: 'required',
                LIOrder: {required: true, digits: true}
                //ImageFiles: {required: false, accept: 'png|jpg|gif', filesize: 1048576}
            },
            messages: {
                LVTitle: '<?= LKEY::GET('plsEnter|languageName') ?>',
                LVLangCode: '<?= LKEY::GET('plsEnter|languageCode') ?>',
                LIOrder: {
                    required: '<?= LKEY::GET('plsEnter|Order') ?>',
                    digits: '<?= LKEY::GET('msgOrderError') ?>'}
                //ImageFiles: 'Vui lòng chọn đúng định dạnh ảnh'
            },
            success: function (e) {
                $(e).ValidateSuccess({remove: '.img-tmp'})
            },
            highlight: function (e, r) {
                $(e).ValidateError()
            }
//                    submitHandler: function (e) {
//                        alert('submit')
//                    }
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