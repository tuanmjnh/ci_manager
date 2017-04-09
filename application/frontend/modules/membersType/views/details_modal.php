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
                    <input type="hidden" name="GUID" value="<?= isset($d->GUID) ? $d->GUID : NULL ?>">
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('membersTypeTitle') ?></th>
                                <td class="form-group">
                                    <input name="GVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|membersTypeTitle') ?>" 
                                           value="<?= isset($d->GVTitle) ? $d->GVTitle : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Discount') ?></th>
                                <td class="form-group">
                                    <input name="GVPlus" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|Discount') ?>" 
                                           value="<?= isset($d->GVPlus) ? $d->GVPlus : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Order') ?></th>
                                <td class="form-group">
                                    <input name="GIOrder" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|Order') ?>"
                                           value="<?= isset($d->GIOrder) ? $d->GIOrder : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Options') ?></th>
                                <td class="form-group">
                                    <div class="fix-check">
                                        <label>
                                            <input id="flag" type="checkbox" name="GIFlag" value="1" <?= isset($d->GIFlag) && $d->GIFlag == '1' ? 'checked' : NULL ?>>
                                            <?= LKEY::GET('Show') ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('ClassIcon') ?></th>
                                <td class="form-group">
                                    <input name="GVContent" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|ClassIcon') ?>" 
                                           value="<?= isset($d->GVContent) ? $d->GVContent : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Description') ?></th>
                                <td class="form-group">
                                    <textarea name="GVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Description') ?>"
                                              ><?= isset($d->GVDesc) ? $d->GVDesc : NULL ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Images') ?></th>
                                <td class="form-group">
                                    <div class="imgCheck">
                                        <img src="<?= isset($d->GVImages) && $d->GVImages != '/' ? TM_BASE_URL . $d->GVImages : NULL ?>" 
                                             alt="<?= isset($d->GVTitle) ? $d->GVTitle : NULL ?>">
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
        $("#form_update_modal").validate({
            rules: {
                GVTitle: 'required',
                GIOrder: {required: true, digits: true},
                GVPlus: {required: true, digits: true},
            },
            messages: {
                GVTitle: '<?= LKEY::GET('plsEnter|moduleName') ?>',
                GIOrder: {
                    required: '<?= LKEY::GET('plsEnter|Order') ?>',
                    digits: '<?= LKEY::GET('msgOrderError') ?>'},
                GVPlus: {
                    required: '<?= LKEY::GET('plsEnter|Discount') ?>',
                    digits: '<?= LKEY::GET('msgDiscountError') ?>'}
            },
            success: function (e) {
                $(e).ValidateSuccess();
            },
            highlight: function (e, r) {
                $(e).ValidateError();
            }
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