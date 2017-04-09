<form id="form_update_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
<!--    <input type="hidden" name="<? $this->security->get_csrf_token_name(); ?>" value="<? $this->security->get_csrf_hash(); ?>">-->
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="close-modal" class="close TMDT-Refresh" TMDT-Refresh=".TMDT" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><?= $mTitle ?></h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="TMAlert"></div>
                    <input type="hidden" name="LKIID" value="<?= isset($d->LKIID) ? $d->LKIID : NULL ?>">
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <td class="form-group">
                                    <input name="LKVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|LangItemKey') ?>" 
                                           value="<?= isset($d->LKVTitle) ? htmlspecialchars($d->LKVTitle) : NULL ?>">
                                </td>
                                <td class="form-group">
                                    <input name="LIVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|LangItemValue') ?>" 
                                           value="<?= isset($d->LIVTitle) ? htmlspecialchars($d->LIVTitle) : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="form-group">
                                    <input name="LKVDesc" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|LangItemDescKey') ?>" 
                                           value="<?= isset($d->LKVDesc) ? $d->LKVDesc : NULL ?>">
                                </td>
                                <td class="form-group">
                                    <input name="LIVDesc" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|LangItemDescValue') ?>" 
                                           value="<?= isset($d->LIVDesc) ? $d->LIVDesc : NULL ?>">
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
                        LKVTitle: 'required',
                        LIVTitle: 'required',
                    },
                    messages: {
                        LKVTitle: '<?= LKEY::GET('plsEnter|LangItemKey') ?>',
                        LIVTitle: '<?= LKEY::GET('plsEnter|LangItemValue') ?>',
                    },
                    success: function (e) {
                        $(e).ValidateSuccess();
                    },
                    highlight: function (e, r) {
                        $(e).ValidateError();
                    }
                });
        $('#btnUpdate').click(function (e) {
            if ($('#form_update_modal').valid()) {
                $('#form_update_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('update') ?>', reset: false});
            }
            return false;
        });
    });
</script>