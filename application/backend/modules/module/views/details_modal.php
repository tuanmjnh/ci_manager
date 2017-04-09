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
                    <input type="hidden" name="MVID" value="<?= isset($d->MVID) ? $d->MVID : NULL ?>">
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
                                                selected: {id: 'MVParent', value: '<?= isset($d->MVParent) ? $d->MVParent : NULL ?>'}
                                            });
                                        });
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('moduleName') ?></th>
                                <td colspan="3" class="form-group">
                                    <input name="MVTitle" type="text" class="form-control" 
                                           placeholder="<?= LKEY::GET('Placeholder|moduleName') ?>" 
                                           value="<?= isset($d->MVTitle) ? $d->MVTitle : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('moduleUrl') ?></th>
                                <td colspan="3" class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><?= $this->tmpluss->getUrl() ?></span>
                                        <input name="MVUrl" type="text" class="form-control" 
                                               placeholder="<?= LKEY::GET('Placeholder|moduleUrl') ?>"
                                               value="<?= isset($d->MVUrl) ? $d->MVUrl : NULL ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Details') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea name="MVDesc" class="form-control" 
                                              placeholder="<?= LKEY::GET('Placeholder|Details') ?>"
                                              ><?= isset($d->MVDesc) ? $d->MVDesc : NULL ?></textarea>

                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('ClassIcon') ?></th>
                                <td colspan="3">
                                    <input name="MVCIcon" type="text"  class="form-control"  
                                           placeholder="<?= LKEY::GET('Placeholder|ClassIcon') ?>"
                                           value="<?= isset($d->MVCIcon) ? $d->MVCIcon : NULL ?>">
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Order') ?></th>
                                <td class="form-group">
                                    <div class="row col-md-6">
                                        <input name="MIOrder" type="text"  class="form-control" 
                                               placeholder="<?= LKEY::GET('Placeholder|Order') ?>" 
                                               value="<?= isset($d->MIOrder) ? $d->MIOrder : 0 ?>">
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
                                                $checked = '';
                                                if (in_array($v->RVKey, $this->tmpluss->getArray($d->MVRoles)))
                                                    $checked = 'checked';
                                                echo '<label><input type="checkbox" name="MVRoles[]" ' . $checked . ' value="' .
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
                                <td colspan="3" class="form-group">
                                    <div class="imgCheck">
                                        <?= isset($d->MVIcon) && $d->MVIcon != NULL ? '<img src="' . TM_BASE_URL . $d->MVIcon . '">' : NULL ?>
                                    </div>
                                    <input type="file" id="ImageFiles" name="ImageFiles">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('createBy') ?></th>
                                <td><?= isset($d->MVCBy) ? $d->MVCBy : NULL ?></td>
                                <th><?= LKEY::GET('createDate') ?></th>
                                <td><?= isset($d->MVCDate) ? $d->MVCDate : NULL ?></td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('updateBy') ?></th>
                                <td><?= isset($d->MVUBy) ? $d->MVUBy : NULL ?></td>
                                <th><?= LKEY::GET('updateDate') ?></th>
                                <td><?= isset($d->MVUDate) ? $d->MVUDate : NULL ?></td>
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
                $(e).ValidateSuccess();
            },
            highlight: function (e, r) {
                $(e).ValidateError({fixList: {name: 'MVRoles[]', parent: '#MVRoles'}});
                //$(e).ValidateError({fixList: {name: 'MVUrl', parent: '#MVUrl'}})
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