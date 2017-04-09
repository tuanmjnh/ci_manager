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
                                <th><?= LKEY::GET('BillsBuyBy') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="GVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|BillsBuyBy') ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('membersName') ?></th>
                                <td colspan="2" class="form-group">
                                    <input name="SeoLinkSearch" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|membersName') ?>" >
                                </td>
                                <td class="form-group">
                                    <p class="btn btn-info btn-sm"><i class="fa fa-search"></i> <?= LKEY::GET('BillsSearchMembers') ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Mobile') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="SeoKeyword" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|Mobile') ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Address') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea name="SeoDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Address') ?>"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Description') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea name="GVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Description') ?>"></textarea>
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
        $("#form_create_modal").validate({
            rules: {
                GVTitle: 'required',
                SeoLinkSearch: 'required',
                SeoKeyword: {required: false, digits: true},
            },
            messages: {
                GVTitle: '<?= LKEY::GET('plsEnter|BillsBuyBy') ?>',
                SeoLinkSearch: '<?= LKEY::GET('plsEnter|membersName') ?>',
                SeoKeyword: {digits: '<?= LKEY::GET('msgMobileError') ?>'}
            },
            success: function (e) {},
            highlight: function (e, r) {
                $(e).ValidateError()
            }
        });
        $('#addNew').click(function (e) {
            if ($('#form_create_modal').valid()) {
                $('#form_create_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('insert') ?>'});
            }
            return false;
        });
    });
</script>