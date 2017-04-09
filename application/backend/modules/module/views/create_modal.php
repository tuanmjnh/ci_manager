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
                                                data: <?= json_encode($this->mdl_module->get_list()) ?>,
                                                key: {
                                                    MVTitle: '<?= LKEY::GET('parentOriginal') ?>',
                                                    MVCIcon: 'fa fa-connectdevelop',
                                                    MILevel: null
                                                },
                                                hidden: {MVParent: 'NULL', MVSParent: ',', MILevel: '-1'},
                                                dHidden: {MVParent: 'MVID', MVSParent: 'MVSParent|MVID', MILevel: 'MILevel'},
                                                selected: {id: 'MVParent', value: null}
                                            });
                                        });
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('moduleName') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="MVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|moduleName') ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('moduleUrl') ?></th>
                                <td id="MVUrl" colspan="3" class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><?= $this->tmpluss->getUrl() ?></span>
                                        <input name="MVUrl" type="text" class="form-control" 
                                               placeholder="<?= LKEY::GET('Placeholder|moduleUrl') ?>">
                                    </div>
                                    <label for="MVUrl" class="error" id="MVUrl-error">Vui lòng nhập Liên kết mặc định</label>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Details') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea name="MVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Details') ?>"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('ClassIcon') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="MVCIcon" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|ClassIcon') ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Order') ?></th>
                                <td class="form-group">
                                    <div class="row col-md-6">
                                        <input name="MIOrder" type="text"  class="form-control" value="0" 
                                               placeholder="<?= LKEY::GET('Placeholder|Order') ?>">
                                    </div>
                                </td>
                                <th><?= LKEY::GET('Options') ?></th>
                                <td class="form-group middle">
                                    <div class="fix-check">
                                        <label>
                                            <input id="flag" type="checkbox" name="MIFlag" value="1" 
                                                   <?= isset($d->MIFlag) && $d->MIFlag == '1' ? 'checked' : NULL ?>>
                                                   <?= LKEY::GET('Show') ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('rolesList') ?></th>
                                <td colspan="3" class="form-group middle">
                                    <div id="MVRoles" class="fix-check list-check">
                                        <div class="error-box">
                                            <?php
                                            foreach ($this->mdl_roles->get_all() as $k => $v) {
                                                echo '<label><input type="checkbox" name="MVRoles[]" value="' .
                                                $v->RVKey . '" id="' . $v->RVKey . '">' . $v->RVName . '</label>';
                                            }
                                            ?>
                                        </div>
                                        <label for="MVRoles[]" class="error"></label>
                                    </div>
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
                MVTitle: 'required',
                MVUrl: 'required',
                MIOrder: {required: true, digits: true},
                'MVRoles[]': 'required'
            },
            messages: {
                MVTitle: '<?= LKEY::GET('plsEnter|moduleName') ?>',
                MVUrl: '<?= LKEY::GET('plsEnter|moduleUrl') ?>',
                MIOrder: {
                    required: '<?= LKEY::GET('plsEnter|Order') ?>',
                    digits: '<?= LKEY::GET('msgOrderError') ?>'},
                'MVRoles[]': '<?= LKEY::GET('plsChoose|rolesType') ?>'
            },
            success: function (e) {
                $(e).ValidateSuccess({remove: '.img-tmp'})
            },
            highlight: function (e, r) {
                $(e).ValidateError({fixList: {name: 'MVRoles[]', parent: '#MVRoles'}});
                //$(e).ValidateError({fixList: {name: 'MVUrl', parent: '#MVUrl'}})
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