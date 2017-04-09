<form id="form_create_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
<!--    <input type="hidden" name="<? $this->security->get_csrf_token_name(); ?>" value="<? $this->security->get_csrf_hash(); ?>">-->
    <div class="modal-dialog" style="width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="close-modal" class="close TMDT-Refresh" TMDT-Refresh=".TMDT" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><?= isset($mTitle) ? $mTitle : NULL ?></h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="TMAlert"></div>
                    <div class="panel panel-success panel-customer">
                        <div class="panel-heading"><?= LKEY::GET('InforMain') ?></div>
                        <div class="panel-body">
                            <table class="table-details" align="center">
                                <tbody>
                                    <tr>
                                        <th><?= LKEY::GET('ProductGroup') ?></th>
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
                                                        selected: {id: 'GIParentID', value: null, index: 0},
                                                        noParent: true
                                                    });
                                                });
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?= LKEY::GET('ProductTitle') ?></th>
                                        <td class="form-group">
                                            <input name="Title" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|ProductTitle') ?>" >
                                        </td>
                                        <th><?= LKEY::GET('ProductCode') ?></th>
                                        <td class="form-group">
                                            <input name="Code" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|ProductCode') ?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?= LKEY::GET('ProductFPrice') ?></th>
                                        <td class="form-group">
                                            <input name="FPrice" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|ProductFPrice') ?>" >
                                        </td>
                                        <th><?= LKEY::GET('ProductLPrice') ?></th>
                                        <td class="form-group">
                                            <input name="LPrice" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|ProductLPrice') ?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?= LKEY::GET('Order') ?></th>
                                        <td class="form-group"><div class="row col-md-8">
                                                <input name="Orders" type="text"  class="form-control" value="0" 
                                                       placeholder="<?= LKEY::GET('Placeholder|Order') ?>"></div>
                                        </td>

                                        <th><?= LKEY::GET('Options') ?></th>
                                        <td class="form-group">
                                            <div class="fix-check">
                                                <label>
                                                    <input id="flag" type="checkbox" name="Flag" value="1" checked>
                                                    <?= LKEY::GET('Show') ?>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="infor-sub-main" class="panel panel-info panel-customer">
                        <div class="panel-heading"><?= LKEY::GET('InforSub') ?>
                            <div class="pull-right">
                                <button type="button" id="addInforSub" name="addInforSub" value="1" class="btn btn-info btn-xs">
                                    <?= LKEY::GET('BtnCreate') ?></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <input id="sub_items" type="hidden" name="sub_items" value="1">
                            <table class="table-details infor-sub-item" align="center">
                                <tbody>
                                    <tr>
                                        <th><?= LKEY::GET('Quantity') ?></th>
                                        <td class="form-group">
                                            <input name="Quantity" type="text" class="form-control sQuantity" 
                                                   placeholder="<?= LKEY::GET('Placeholder|Quantity') ?>" >
                                            <label for="Quantity" class="error"></label>
                                        </td>
                                        <th><?= LKEY::GET('Origin') ?></th>
                                        <td class="form-group">
                                            <input name="Origin" type="text" class="form-control sOrigin" 
                                                   placeholder="<?= LKEY::GET('Placeholder|Origin') ?>" >
                                        </td>
                                        <td rowspan="3" class="remove-sub-infor-item">
                                            <i class="fa fa-times button"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?= LKEY::GET('Color') ?></th>
                                        <td class="form-group">
                                            <input name="Color" type="text" class="form-control sColor" 
                                                   placeholder="<?= LKEY::GET('Placeholder|Color') ?>" >
                                        </td>
                                        <th><?= LKEY::GET('Size') ?></th>
                                        <td class="form-group">
                                            <input name="Size" type="text" class="form-control sSize" 
                                                   placeholder="<?= LKEY::GET('Placeholder|Size') ?>" >
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th><?= LKEY::GET('Images') ?></th>
                                        <td colspan="4" class="form-group"><input type="file" class="ImageFiles" name="ImageFiles[]" multiple=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-warning panel-customer">
                        <div class="panel-heading"><?= LKEY::GET('InforExtra') ?></div>
                        <div class="panel-body">
                            <table class="table-details" align="center">
                                <tbody>
                                    <tr>
                                        <th><?= LKEY::GET('Description') ?></th>
                                        <td colspan="3" class="form-group">
                                            <textarea name="Desc" class="form-control" 
                                                      placeholder="<?= LKEY::GET('Placeholder|Description') ?>"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?= LKEY::GET('Content') ?></th>
                                        <td colspan="3" class="form-group">
                                            <textarea name="Content" class="form-control" 
                                                      placeholder="<?= LKEY::GET('Placeholder|Content') ?>"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="addNew" name="addNew" value="1" class="btn btn-primary">
                    <?= LKEY::GET('BtnCreate') ?></button>
                <button type="button" id="cancel-model" class="btn btn-default TMDT-Refresh" TMDT-Refresh=".TMDT" data-dismiss="modal">
                    <?= LKEY::GET('BtnCancel') ?></button>
            </div>
            <div>
                <input id="test" type="button" name="test" value="Test">
            </div>
        </div>
    </div>
</form>
<script>
    $(function () {
        var sub_item = 1;
        $('.sQuantity').attr('name', 'Quantity1');
        $('.sOrigin').attr('name', 'Origin1');
        $('.sColor').attr('name', 'Color1');
        $('.sSize').attr('name', 'Size1');
        $('.ImageFiles').attr('name', 'ImageFiles1[]')

        function checkInput(parent) {
            $(parent).each(function (index) {
                $(this).find('input[type=text]').each(function (i) {
                    if ($(this).val() == null || $(this).val() == '')
                        $(this).val('null');
                });
            })
        }
        $('#test').on('click', function () {
            $('#form_create_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('test_image') ?>'});
        })
        $('#addInforSub').on('click', function () {
            sub_item++;
            var main = $('#infor-sub-main');
            var item = main.find('.infor-sub-item');
            var main_item = $(item).parent();
            main_item.append($(item).prop('outerHTML'))
            $('#sub_items').val(parseInt($('#sub_items').val()) + 1);
            var last_item = $(main).find('.infor-sub-item').last();
            last_item.find('input[type=file]');
            last_item.find('input[type=file]').attr('name', 'ImageFiles' + sub_item + '[]');
            last_item.find('.sQuantity').attr('name', 'Quantity' + sub_item);
            last_item.find('.sOrigin').attr('name', 'Origin' + sub_item);
            last_item.find('.sColor').attr('name', 'Color' + sub_item);
            last_item.find('.sSize').attr('name', 'Size' + sub_item);
        });
        $(document).on('click', '.remove-sub-infor-item', function () {
            if ($('.remove-sub-infor-item').length > 1) {
                $(this).parent().parent().parent().remove();
                $('#sub_items').val(parseInt($('#sub_items').val()) - 1);
            }
        })
        $("#form_create_modal").validate({
            rules: {
                Title: 'required',
                Code: 'required',
                FPrice: {required: true, number: true},
                LPrice: {required: false, number: true},
                Order: {required: true, digits: true},
                'Quantity[]': {required: true, digits: true},
            },
            messages: {
                Title: '<?= LKEY::GET('plsEnter|ProductTitle') ?>',
                Code: '<?= LKEY::GET('plsEnter|ProductCode') ?>',
                FPrice: {
                    required: '<?= LKEY::GET('plsEnter|ProductFPrice') ?>',
                    number: '<?= LKEY::GET('msgFPriceError') ?>'},
                LPrice: {
                    number: '<?= LKEY::GET('msgLPriceError') ?>'},
                Order: {
                    required: '<?= LKEY::GET('plsEnter|Order') ?>',
                    digits: '<?= LKEY::GET('msgOrderError') ?>'},
                'Quantity[]': {
                    required: '<?= LKEY::GET('plsEnter|Quantity') ?>',
                    digits: '<?= LKEY::GET('msgQuantityError') ?>'}
            },
            success: function (e) {
                $(e).ValidateSuccess({remove: '.img-tmp'})
            },
            highlight: function (e, r) {
                $(e).ValidateError()
            }
        });
        var validImg = $('.ImageFiles').ValidateFile({
            ext: 'gif|jpg|jpeg|png',
            messages: '<?= LKEY::GET('msgFileError') ?>',
            imgLoad: '<?php TM_BASE_URL . 'assets/loading/load1.gif' ?>'});
        $('#addNew').click(function (e) {
            if ($('#form_create_modal').valid() && validImg) {
                //checkInput('.infor-sub-item');
                $('#sub_items').val(sub_item);
                $('#form_create_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('insert') ?>'});
            }
            return false;
        });
    });
</script>