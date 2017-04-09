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
                                                selected: {id: 'GIParentID', value: null}
                                            });
                                        });
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('GroupTitle') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="GVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|GroupTitle') ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Order') ?></th>
                                <td class="form-group"><div class="row col-md-8">
                                        <input name="GIOrder" type="text"  class="form-control" value="0" 
                                               placeholder="<?= LKEY::GET('Placeholder|Order') ?>"></div>
                                </td>

                                <th><?= LKEY::GET('Options') ?></th>
                                <td class="form-group">
                                    <div class="fix-check">
                                        <label>
                                            <input id="flag" type="checkbox" name="GIFlag" value="1" checked>
                                            <?= LKEY::GET('Show') ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Description') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea name="GVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Description') ?>"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Content') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea name="GVContent" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Content') ?>"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Images') ?></th>
                                <td colspan="3" class="form-group"><input id="ImageFiles" name="ImageFiles" type="file"> </td>
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