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
                    <input type="hidden" name="LIID" value="<?= isset($d->LIID) ? $d->LIID : NULL ?>">
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('languageName') ?></th>
                                <td class="form-group">
                                    <input name="LVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|languageName') ?>" 
                                           value="<?= isset($d->LVTitle) ? $d->LVTitle : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('languageCode') ?></th>
                                <td class="form-group">
                                    <input name="LVLangCode" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|languageCode') ?>"
                                           value="<?= isset($d->LVLangCode) ? $d->LVLangCode : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('languageISOCode') ?></th>
                                <td class="form-group">
                                    <input name="LVISOCode" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|languageISOCode') ?>"
                                           value="<?= isset($d->LVISOCode) ? $d->LVISOCode : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('languageCountryCode') ?></th>
                                <td class="form-group">
                                    <input name="LVCountryCode" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|languageCountryCode') ?>"
                                           value="<?= isset($d->LVCountryCode) ? $d->LVCountryCode : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Order') ?></th>
                                <td class="form-group">
                                    <div class="row col-md-3">
                                        <input name="LIOrder" type="text"  class="form-control" 
                                               placeholder="<?= LKEY::GET('Placeholder|Order') ?>" 
                                               value="<?= isset($d->LIOrder) ? $d->LIOrder : 0 ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Options') ?></th>
                                <td class="form-group">
                                    <div class="fix-check">
                                        <label>
                                            <input id="flag" type="checkbox" name="LIFlag" value="1" <?= isset($d->LIFlag) && $d->LIFlag == '1' ? 'checked' : NULL ?>>
                                            <?= LKEY::GET('Show') ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Details') ?></th>
                                <td class="form-group">
                                    <textarea name="LVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Details') ?>"
                                              ><?= isset($d->LVDesc) ? $d->LVDesc : NULL ?></textarea>

                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Images') ?></th>
                                <td class="form-group">
                                    <div class="imgCheck">
                                        <img src="<?= isset($d->LVImages) && $d->LVImages != '/' ? TM_BASE_URL . $d->LVImages : NULL ?>" alt="<?= isset($d->LVTitle) ? $d->LVTitle : NULL ?>">
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
                        LVTitle: 'required',
                        LVLangCode: 'required',
                        LIOrder: {required: true, digits: true}
                    },
                    messages: {
                        LVTitle: '<?= LKEY::GET('plsEnter|languageName') ?>',
                        LVLangCode: '<?= LKEY::GET('plsEnter|languageCode') ?>',
                        LIOrder: {
                            required: '<?= LKEY::GET('plsEnter|Order') ?>',
                            digits: '<?= LKEY::GET('msgOrderError') ?>'}
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