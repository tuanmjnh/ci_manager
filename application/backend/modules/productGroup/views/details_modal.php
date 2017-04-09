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
                                <th><?= LKEY::GET('parentList') ?></th>
                                <td colspan="3">
                                    <div class="dropdown-parent"></div>
                                    <script>
                                        $(function () {
                                            $('.dropdown-parent').DropdownParent({
                                                data: <?= json_encode($this->mdl_productGroup->get_list()) ?>,
                                                key: {
                                                    GVTitle: '<?= LKEY::GET('parentOriginal') ?>',
                                                    MVCIcon: null,
                                                    GILevel: null
                                                },
                                                hidden: {GIParentID: 'NULL', GIParentSID: ',', GILevel: '-1'},
                                                dHidden: {GIParentID: 'GUID', GIParentSID: 'GIParentSID|GUID', GILevel: 'GILevel'},
                                                selected: {id: 'GIParentID', value: '<?= isset($d->GIParentID) ? $d->GIParentID : NULL ?>'}
                                            });
                                        });
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('GroupTitle') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="GVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|GroupTitle') ?>" 
                                           value="<?= isset($d->GVTitle) ? $d->GVTitle : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Order') ?></th>
                                <td class="form-group"><div class="row col-md-8">
                                        <input name="GIOrder" type="text" class="form-control" 
                                               placeholder="<?= LKEY::GET('Placeholder|Order') ?>"
                                               value="<?= isset($d->GIOrder) ? $d->GIOrder : NULL ?>">
                                    </div>
                                </td>

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
                                <th><?= LKEY::GET('Description') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea name="GVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Description') ?>"
                                              ><?= isset($d->GVDesc) ? $d->GVDesc : NULL ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Content') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea name="GVContent" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Content') ?>"
                                              ><?= isset($d->GVContent) ? $d->GVContent : NULL ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Images') ?></th>
                                <td colspan="3" class="form-group">
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
            },
            messages: {
                GVTitle: '<?= LKEY::GET('plsEnter|GroupTitle') ?>',
                GIOrder: {
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