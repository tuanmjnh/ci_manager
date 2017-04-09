<form id="form_update_modal" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
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
                    <input type="hidden" name="IUID" value="<?= isset($d->IUID) ? $d->IUID : NULL ?>">
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
                                                        selected: {id: 'GIParentID', value: '<?= isset($d->GUID) ? $d->GUID : NULL ?>'},
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
                                                   placeholder="<?= LKEY::GET('Placeholder|ProductTitle') ?>" 
                                                   value="<?= isset($d->IVTitle) ? $d->IVTitle : NULL ?>">
                                        </td>
                                        <th><?= LKEY::GET('ProductCode') ?></th>
                                        <td class="form-group">
                                            <input name="Code" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|ProductCode') ?>" 
                                                   value="<?= isset($d->IVKey) ? $d->IVKey : NULL ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?= LKEY::GET('ProductFPrice') ?></th>
                                        <td class="form-group">
                                            <input name="FPrice" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|ProductFPrice') ?>" 
                                                   value="<?= isset($d->IFFPrice) ? $d->IFFPrice : NULL ?>">
                                        </td>
                                        <th><?= LKEY::GET('ProductLPrice') ?></th>
                                        <td class="form-group">
                                            <input name="LPrice" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|ProductLPrice') ?>" 
                                                   value="<?= isset($d->IFLPrice) ? $d->IFLPrice : NULL ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?= LKEY::GET('Order') ?></th>
                                        <td class="form-group"><div class="row col-md-8">
                                                <input name="Orders" type="text"  class="form-control" 
                                                       placeholder="<?= LKEY::GET('Placeholder|Order') ?>"
                                                       value="<?= isset($d->IIOrder) ? $d->IIOrder : NULL ?>"></div>
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
                                    <tr>
                                        <th><?= LKEY::GET('Total_Item') ?></th>
                                        <td class="form-group"><div class="row col-md-8">
                                                <?= isset($d->IITotalSubItems) ? $d->IITotalSubItems : NULL ?> </div>
                                        </td>
                                        <th><?= LKEY::GET('TotalQuantity') ?></th>
                                        <td class="form-group">
                                            <?= isset($d->IITotalView) ? $d->IITotalView : NULL ?>
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
                            <?php
                            if (count($d->sub_item) < 1) {
                                ?>
                                <input id="sub_items" type="hidden" name="sub_items" value="1">
                                <table class="table-details infor-sub-item" align="center">
                                    <tbody>
                                        <tr>
                                            <th><?= LKEY::GET('Quantity') ?></th>
                                            <td class="form-group">
                                                <input name="Quantity1" type="text" class="form-control sQuantity" 
                                                       placeholder="<?= LKEY::GET('Placeholder|Quantity') ?>" >
                                                <label for="Quantity1" class="error"></label>
                                            </td>
                                            <th><?= LKEY::GET('Origin') ?></th>
                                            <td class="form-group">
                                                <input name="Origin1" type="text" class="form-control sOrigin" 
                                                       placeholder="<?= LKEY::GET('Placeholder|Origin') ?>" >
                                            </td>
                                            <td rowspan="3" class="remove-sub-infor-item">
                                                <i class="fa fa-times button"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?= LKEY::GET('Color') ?></th>
                                            <td class="form-group">
                                                <input name="Color1" type="text" class="form-control sColor" 
                                                       placeholder="<?= LKEY::GET('Placeholder|Color') ?>" >
                                            </td>
                                            <th><?= LKEY::GET('Size') ?></th>
                                            <td class="form-group">
                                                <input name="Size1" type="text" class="form-control sSize" 
                                                       placeholder="<?= LKEY::GET('Placeholder|Size') ?>" >
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th><?= LKEY::GET('Images') ?></th>
                                            <td colspan="4" class="form-group"><input type="file" class="ImageFiles" name="ImageFiles1[]" multiple=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                ?>
                                <input id="sub_items" type="hidden" name="sub_items" value="<?= count($d->sub_item) ?>">
                                <?php
                                foreach ($d->sub_item as $key => $value) {
                                    $index = $key + 1;
                                    ?>
                                    <table class="table-details infor-sub-item" align="center">
                                        <tbody>
                                            <tr>
                                                <th><?= LKEY::GET('Quantity') ?></th>
                                                <td class="form-group">
                                                    <input type="hidden" name="SIUID<?= $index ?>" value="<?= $value->SIUID ?>">
                                                    <input name="Quantity<?= $index ?>" type="text" class="form-control sQuantity" 
                                                           placeholder="<?= LKEY::GET('Placeholder|Quantity') ?>" 
                                                           value="<?= $value->SIVTitle ?>">
                                                    <label for="Quantity<?= $index ?>" class="error"></label>
                                                </td>
                                                <th><?= LKEY::GET('Origin') ?></th>
                                                <td class="form-group">
                                                    <input name="Origin<?= $index ?>" type="text" class="form-control sOrigin" 
                                                           placeholder="<?= LKEY::GET('Placeholder|Origin') ?>" 
                                                           value="<?= $value->SIVDesc ?>">
                                                </td>
                                                <td rowspan="3">
                                                    <i class="fa fa-times button remove-sub-infor-item" 
                                                       value="<?= $d->IUID . ',' . $value->SIUID ?>" 
                                                       data-title="<?= LKEY::GET('ConfirmTitle') ?>" 
                                                       data-btnoklabel="<?= LKEY::GET('ConfirmOk') ?>" 
                                                       data-btncancellabel="<?= LKEY::GET('ConfirmCancel') ?>"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><?= LKEY::GET('Color') ?></th>
                                                <td class="form-group">
                                                    <input name="Color<?= $index ?>" type="text" class="form-control sColor" 
                                                           placeholder="<?= LKEY::GET('Placeholder|Color') ?>" 
                                                           value="<?= $value->SIVEmail ?>">
                                                </td>
                                                <th><?= LKEY::GET('Size') ?></th>
                                                <td class="form-group">
                                                    <input name="Size<?= $index ?>" type="text" class="form-control sSize" 
                                                           placeholder="<?= LKEY::GET('Placeholder|Size') ?>" 
                                                           value="<?= $value->SIVAuthor ?>">
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th><?= LKEY::GET('Images') ?></th>
                                                <td colspan="4" class="form-group">
                                                    <?php
                                                    $img = TMLib::SplitTrim($value->SIVImages);
                                                    if ($img != '' || $img != NULL) {
                                                        echo '<div class="img50 imgCheck"><ul>';
                                                        foreach (TMLib::SplitTrim($value->SIVImages) as $KImg => $VImg) {
                                                            echo '<li><img src="' . TM_BASE_URL . $VImg . '" alt="">';
                                                            echo '<div><i class="fa fa-times button btn-danger removeImages" ' .
                                                            'value="' . $value->SIUID . ',' . $VImg . '" ' .
                                                            'data-title="' . LKEY::GET('ConfirmTitle') . '" ' .
                                                            'data-btnoklabel="' . LKEY::GET('ConfirmOk') . '" ' .
                                                            'data-btncancellabel="' . LKEY::GET('ConfirmCancel') . '" ' .
                                                            '></i></div></li>';
                                                        }
                                                        echo'</ul></div>';
                                                    }
                                                    ?>
                                                    <input type="file" class="ImageFiles clear" name="ImageFiles<?= $index ?>[]" multiple="">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                            }
                            ?>
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
                                                      placeholder="<?= LKEY::GET('Placeholder|Description') ?>"
                                                      ><?= isset($d->IVDesc) ? $d->IVDesc : NULL ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?= LKEY::GET('Content') ?></th>
                                        <td colspan="3" class="form-group">
                                            <textarea name="Content" class="form-control" 
                                                      placeholder="<?= LKEY::GET('Placeholder|Content') ?>"
                                                      ><?= isset($d->IVContent) ? $d->IVContent : NULL ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        var sub_items = $('#sub_items').val();
        console.log(sub_items)
//        $('.sQuantity').attr('name', 'Quantity1');
//        $('.sOrigin').attr('name', 'Origin1');
//        $('.sColor').attr('name', 'Color1');
//        $('.sSize').attr('name', 'Size1');
//        $('.ImageFiles').attr('name', 'ImageFiles1[]');

        function checkInput(parent) {
            $(parent).each(function (index) {
                $(this).find('input[type=text]').each(function (i) {
                    if ($(this).val() == null || $(this).val() == '')
                        $(this).val('null');
                });
            })
        }
        function setDefaultSubInfor(last_item) {
            last_item.find('input[type=file]').attr('name', 'ImageFiles' + sub_items + '[]').val('');
            last_item.find('.sQuantity').attr('name', 'Quantity' + sub_items).val('');
            last_item.find('.sOrigin').attr('name', 'Origin' + sub_items).val('');
            last_item.find('.sColor').attr('name', 'Color' + sub_items).val('');
            last_item.find('.sSize').attr('name', 'Size' + sub_items).val('');
            last_item.find('.imgCheck').remove();
            last_item.find('.glyphicon').remove();
            last_item.find('input[type=hidden]').remove();
        }
        $('#addInforSub').on('click', function () {
            sub_items++;
            var main = $('#infor-sub-main');
            var item = main.find('.infor-sub-item');
            var main_item = $(item).parent();
            main_item.append($(item).prop('outerHTML'))
            $('#sub_items').val(parseInt($('#sub_items').val()) + 1);
            setDefaultSubInfor($(main).find('.infor-sub-item').last());
        });
//        $(document).on('click', '.remove-sub-infor-item', function () {
//            if ($('.remove-sub-infor-item').length > 1) {
//                $(this).parent().parent().parent().remove();
//                $('#sub_items').val(parseInt($('#sub_items').val()) - 1);
//            }else{
//                setDefaultSubInfor($(this).parent().parent().parent().parent());
//            }
//        });
        $('.remove-sub-infor-item').TMConfirmAjaxPost({
            url: '<?= $this->tmpluss->getUrlAction('remove_sub_item') ?>',
            reset: false,
            success: function (e, a) {
                if ($('.remove-sub-infor-item').length > 1) {
                    $('#sub_items').val(parseInt($('#sub_items').val()) - 1);
                    $(a).parent().parent().parent().parent().fadeOut('slow', function () {
                        $(this).remove()
                    })
                } else
                    setDefaultSubInfor($(a).parent().parent().parent().parent());
            }
        });
        $('.removeImages').TMConfirmAjaxPost({
            url: '<?= $this->tmpluss->getUrlAction('remove_images') ?>',
            reset: false,
            success: function (e, a) {
                $(a).parent().parent().fadeOut('slow', function () {
                    $(this).remove()
                })
            }
        });
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
        $('#btnUpdate').click(function (e) {
            if ($('#form_update_modal').valid() && validImg) {
                //checkInput('.infor-sub-item');
                $('#sub_items').val(sub_items);
                $('#form_update_modal').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('update') ?>', reset: false});
            }
            return false;
        });
    });
</script>