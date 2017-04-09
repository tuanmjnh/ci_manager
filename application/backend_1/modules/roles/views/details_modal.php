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
                    <input type="hidden" name="<?= objRoles::$RVID ?>" value="<?= isset($d[objRoles::$RVID]) ? $d[objRoles::$RVID] : NULL ?>">
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('rolesName') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="<?= objRoles::$RVName ?>" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|rolesName') ?>" 
                                           value="<?= isset($d[objRoles::$RVName]) ? $d[objRoles::$RVName] : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('rolesKey') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="<?= objRoles::$RVKey ?>" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|rolesKey') ?>"
                                           value="<?= isset($d[objRoles::$RVKey]) ? $d[objRoles::$RVKey] : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Details') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea name="<?= objRoles::$RVDesc ?>" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Details') ?>"
                                              ><?= isset($d[objRoles::$RVDesc]) ? $d[objRoles::$RVDesc] : NULL ?></textarea>

                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('ClassIcon') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="<?= objRoles::$RVCIcon ?>" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|ClassIcon') ?>" 
                                           value="<?= isset($d[objRoles::$RVCIcon]) ? $d[objRoles::$RVCIcon] : 0 ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Order') ?></th>
                                <td colspan="3" class="form-group">
                                    <div class="row col-md-3">
                                        <input name="<?= objRoles::$RIOrder ?>" type="text"  class="form-control" 
                                               placeholder="<?= LKEY::GET('Placeholder|Order') ?>" 
                                               value="<?= isset($d[objRoles::$RIOrder]) ? $d[objRoles::$RIOrder] : 0 ?>">
                                    </div>
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
                '<?= objRoles::$RVName ?>': 'required',
                '<?= objRoles::$RVKey ?>': 'required',
                        '<?= objRoles::$RIOrder ?>': {required: true, digits: true}
            },
            messages: {
                '<?= objRoles::$RVName ?>': '<?= LKEY::GET('plsEnter|rolesName') ?>',
                '<?= objRoles::$RVKey ?>': '<?= LKEY::GET('plsEnter|rolesKey') ?>',
                        '<?= objRoles::$RIOrder ?>': {
                            required: '<?= LKEY::GET('plsEnter|Order') ?>',
                            digits: '<?= LKEY::GET('msgOrderError') ?>'}
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