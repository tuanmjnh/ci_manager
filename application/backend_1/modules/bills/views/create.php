<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?= isset($mTitle) ? $mTitle : NULL ?>
            <div id="ajaxLoadTM" class="pull-right" url="<?= TM_BASE_URL ?>"></div>
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading center-block">
                <div class="nav nav-pills">
<!--                    <? LKEY::GET('langkeylist') ?>-->
                    <!--                    <button name="create" id="btnCreate" class="btn btn-sm btn-primary col-xs-1"
                                                data-toggle="modal" data-target="#general-model" data-url="<? $this->tmpluss->getUrlAction('create_modal') ?>">
                                            <? LKEY::GET('BtnCreate') ?></button>-->
                    <!--                    <div class="pull-right">-->
                    <p id="add_members" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i> <?= LKEY::GET('BillsAddMembers') ?></p>
                    <p id="find_members" class="btn btn-info btn-sm" data-toggle="modal" data-target="#general-model" 
                       data-url="<?= $this->tmpluss->getUrlAction('find_members_modal') ?>">
                        <i class="fa fa-search"></i> <?= LKEY::GET('BillsFindMembers') ?></p>
                    <p id="find_products" class="btn btn-success btn-sm" data-toggle="modal" data-target="#general-model" 
                       data-url="<?= $this->tmpluss->getUrlAction('find_products_modal') ?>">
                        <i class="fa fa-search"></i> <?= LKEY::GET('BillsFindProducts') ?></p>
                    <!--                    </div>-->
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form id="form_create" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
                    <div class="TMAlert"></div>
                    <div class="table-responsive">
                        <table class="table-details">
                            <tbody>
                                <tr>
                                    <th><?= LKEY::GET('BillsBuyBy') ?></th>
                                    <td colspan="3" class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                            <input name="GVTitle" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|BillsBuyBy') ?>" >
                                        </div>
                                        <label for="GVTitle" class="error" id="GVTitle-error"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= LKEY::GET('membersName') ?></th>
                                    <td colspan="" class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon" id="membersType"><i class="fa fa-street-view"></i></div>
                                            <input id="membersName" name="SeoLinkSearch" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|membersName') ?>" >
                                            <div class="input-group-addon" id="membersDiscount" title="<?= LKEY::GET('Discount') ?>">0 %</div>
                                        </div>
                                        <label for="membersName" class="error" id="membersName-error"></label>
                                    </td>
                                    <th><?= LKEY::GET('Mobile') ?></th>
                                    <td colspan="" class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                            <input id="Mobile" name="SeoKeyword" type="text" class="form-control" 
                                                   placeholder="<?= LKEY::GET('Placeholder|Mobile') ?>" >
                                        </div>
                                        <label for="Mobile" class="error" id="Mobile-error"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= LKEY::GET('Address') ?></th>
                                    <td colspan="3" class="form-group">
                                        <textarea id="Address" name="SeoDesc" class="form-control" 
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
                                <tr>
                                    <td colspan="4" id="products" style="padding-left:0px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="panel-footer overflow">
                <div class="pull-right">
                    <button type="button" id="addNew" name="addNew" value="1" class="btn btn-primary">
                        <?= LKEY::GET('BtnCreate') ?></button>
                    <!--                    <button type="button" id="cancel-model" class="btn btn-default TMDT-Refresh" TMDT-Refresh=".TMDT" data-dismiss="modal">
                                            <? LKEY::GET('BtnCancel') ?></button>-->
                    <a href="./" class="btn btn-default"><?= LKEY::GET('BtnCancel') ?></a>
<!--                    <input type="button" id="test" value="test">-->
                </div>
            </div>
        </div><!-- /.table-responsive -->
    </div> <!-- /.col-lg-12 -->
</div><!-- /.panel -->
<script>
    $(function () {
        jsonProduct = null;
        function add_members() {
            $('#membersName').removeAttr('readonly').val('');
            $('#Mobile').removeAttr('readonly').val('');
            $('#Address').removeAttr('readonly').val('');
            $('#membersType').html('<i class="fa fa-street-view"></i>');
            $('#membersDiscount').html('0 %');
            members = {discount: 0};
        }
        function add_product() {
            products = [];
            product = {
                id: null,
                name: null,
                key: null,
                color: null,
                size: null,
                quantity: 1,
                fPrice: 0,
                discount: 0,
                lPrice: 0,
                attach: 1,
                total: 0
            }
            total = {
                TotalPrice: 0,
                Paid: 0,
                TotalUnPaid: 0,
                TotalProducts: 0,
                TotalQuantity: 0
            };
            $('#products').html('');
        }
        SelectProduct = function (d) {
            total = {
                TotalPrice: 0,
                Paid: 0,
                TotalUnPaid: 0,
                TotalProducts: 0,
                TotalQuantity: 0
            };
            for (var i = 0; i < d.length; i++) {
                var IFFPrice = parseFloat(d[i].IFFPrice);
                var IFLPrice = parseFloat(d[i].IFLPrice);
                var lPrice = members.discount < 1 ? IFLPrice : Math.ceil(IFFPrice - (members.discount * IFFPrice / 100));
                product = {
                    id: d[i].IUID,
                    name: d[i].IVTitle,
                    key: d[i].IVKey,
                    color: d[i].SIVEmail,
                    size: d[i].SIVAuthor,
                    quantity: products[i] != undefined && products[i].quantity > 1 ? products[i].quantity : 1,
                    fPrice: IFFPrice,
                    discount: members.discount < 1 ?
                            100 - Math.ceil((IFLPrice * 100) / IFFPrice) :
                            members.discount,
                    lPrice: lPrice,
                    attach: 1,
                    total: lPrice
                };
                products[i] = product;
            }
            var rs = '<div style="width:1000px; overflow-x:scroll"><table class="table table-striped table-bordered table-hover">';
            var th = '<thead><tr><th>STT</th>' +
                    '<th><?= LKEY::GET('ProductTitle') ?></th>' +
                    '<th><?= LKEY::GET('ProductCode') ?></th>' +
                    '<th><?= LKEY::GET('Color') ?></th>' +
                    '<th><?= LKEY::GET('Size') ?></th>' +
                    '<th class="col-md-1"><?= LKEY::GET('Quantity') ?></th>' +
                    '<th><?= LKEY::GET('ProductFPrice') ?> (<?= LKEY::GET('rates') ?>)</th>' +
                    '<th><?= LKEY::GET('Discount') ?></th>' +
                    '<th><?= LKEY::GET('ProductLPrice') ?> (<?= LKEY::GET('rates') ?>)</th>' +
                    '<th><?= LKEY::GET('Total') ?> (<?= LKEY::GET('rates') ?>)</th>' +
                    '<th><?= LKEY::GET('ProductAttach') ?></th></tr></thead>';
            var tbody = '<tbody>';
            for (var i = 0; i < products.length; i++) {
                tbody += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td>' + products[i].name + '</td>' +
                        '<td>' + products[i].key + '</td>' +
                        '<td>' + isUndefined(products[i].color, '<?= LKEY::GET('empty') ?>') + '</td>' +
                        '<td>' + isUndefined(products[i].size, '<?= LKEY::GET('empty') ?>') + '</td>' +
                        '<td><input id="qty' + i + '" type="number" name="Qty[]" class="form-control center customer qty" idata="' + i + '" value="1"></td>' +
                        '<td>' + products[i].fPrice + '</td>' +
                        '<td>' + products[i].discount + ' %</td>' +
                        '<td class="price">' + products[i].lPrice + '</td>' +
                        '<td class="total">' + products[i].total + '</td>' +
                        '<td><button type="button" class="btn btn-default btn-xs"><?= LKEY::GET('Choose') ?></button></td>' +
                        '</tr>';
                total.TotalPrice += parseFloat(products[i].lPrice);
                total.TotalProducts = i + 1;
                total.TotalQuantity = i + 1;
                //totalPrice += parseFloat(products[i].lPrice);
            }
            total.Paid = total.TotalPrice;
            tbody += '<tr>' +
                    '<td colspan="7"><b><?= LKEY::GET('TotalPrice') ?></b></td>' +
                    '<td colspan="4"><span id="TotalPrice">' + total.TotalPrice + '</span> <?= LKEY::GET('rates') ?></td>' +
                    '</tr>';
            tbody += '<tr>' +
                    '<td colspan="7"><b><?= LKEY::GET('Paid') ?></b></td>' +
                    '<td colspan="4"><div class="input-group">' +
                    '<input id="Paid" name="Paid" type="number" min="0" class="form-control" value="' + total.TotalPrice + '" placeholder="<?= LKEY::GET('Placeholder|Paid') ?>">' +
                    '<div class="input-group-addon">VNĐ</div></div></td>' +
                    '</tr>';
//                        tbody += '<tr>' +
//                                '<td colspan="7"><b><? LKEY::GET('TotalAmount') ?></b></td>' +
//                                '<td colspan="3"><span id="TotalAmount">' + total.TotalPrice + '</span> <? LKEY::GET('rates') ?></td>' +
//                                '</tr>';
            tbody += '<tr>' +
                    '<td colspan="7"><b><?= LKEY::GET('UnPaid') ?></b></td>' +
                    '<td colspan="4"><span id="TotalUnPaid">0</span> <?= LKEY::GET('rates') ?></td>' +
                    '</tr>';
            tbody += '</tbody>';
            rs += th + tbody + '</table></div>';
            $('#products').html(rs);
            $('#general-model').html('');
            $('#general-model').modal('hide');
        }
        function initialization_members(member, form_data) {
            if (member !== null) {
                member.buyBy = form_data[0].value;
                member.desc = form_data[4].value;
            } else {
                member = {
                    id: null,
                    membersName: form_data[1].value,
                    mobile: form_data[2].value,
                    address: form_data[3].value,
                    buyBy: form_data[0].value,
                    desc: form_data[4].value,
                    discount: 0
                };
            }
            return member;
        }
        function initialization_products(pro) {
            for (var i = 0; i < pro.length; i++) {
                if (pro[i].color === undefined)
                    pro[i].color = null;
                if (pro[i].size === undefined)
                    pro[i].size = null;
                pro[i].quantity = $(document).find('#qty' + i).val();
                pro[i].total = parseInt(pro[i].quantity) * parseInt(pro[i].lPrice);
            }
            return pro;
        }
        add_members();
        add_product();
        $('#test').on('click', function () {
            console.log(products);
            console.log(total);
            console.log(jsonProduct);
        })
        $(document).on('keyup', '#Paid', function () {
            //if($(this).val())
            total.Paid = parseFloat($(this).val());
            if (total.Paid <= total.TotalPrice && total.Paid >= 0) {
                total.TotalUnPaid = total.TotalPrice - total.Paid;
                $('#TotalUnPaid').html(total.TotalUnPaid);
            } else {
                total.Paid = total.TotalPrice;
                $('#TotalUnPaid').html(total.Paid);
                $(this).val(total.Paid);
            }
        });
        $(document).on('keyup', '.qty', function () {
            var index = $(this).attr('idata');
            products[index].quantity = parseInt($(this).val());
            products[index].total = products[index].quantity * products[index].lPrice;
            $(this).parent().parent().find('.total').html(products[index].total);
            total.TotalPrice = 0;
            total.TotalQuantity = 0;
            for (var i = 0; i < products.length; i++) {
                total.TotalQuantity += products[i].quantity;
                total.TotalPrice += parseFloat(products[i].total);
            }
            $('#TotalPrice').html(total.TotalPrice);
            total.Paid = total.TotalPrice;
            $('#Paid').val(total.Paid);
        });
        $('#add_members').on('click', function () {
            add_members();
            members.discount = 0;
            SelectProduct(jsonProduct);
        });
        $('#find_members').TMCallModal();
        $('#find_products').TMCallModal();
        $("#form_create").validate({
            rules: {
                GVTitle: 'required',
                SeoLinkSearch: 'required',
                SeoKeyword: {required: false, digits: true},
                'Qty[]': {required: true, digits: true}
            },
            messages: {
                GVTitle: '<?= LKEY::GET('plsEnter|BillsBuyBy') ?>',
                SeoLinkSearch: '<?= LKEY::GET('plsEnter|membersName') ?>',
                SeoKeyword: {digits: '<?= LKEY::GET('msgMobileError') ?>'},
                'Qty[]': {
                    required: '<?= LKEY::GET('plsEnter|Quantity') ?>',
                    digits: '<?= LKEY::GET('msgQuantityError') ?>'},
            },
            success: function (e) {
                $(e).ValidateSuccess({iconSuccess: false});
            },
            highlight: function (e, r) {
                $(e).ValidateError({iconError: false});
            }
        });
        $('#addNew').click(function (e) {
            if ($('#form_create').valid()) {
                if (products.length < 1)
                    $('#form_create').find('.TMAlert').TMAlert({alert: 'Vui long chọn sản phẩm'});
                else {
                    var data = {};
                    var processData = true;
                    var contentType = 'application/x-www-form-urlencoded';
                    //data = $.extend(members, products);
                    data.members = initialization_members(members, $('#form_create').serializeArray());
                    data.products = initialization_products(products);
                    data.total = total;
                    console.log(data);
                    $('#form_create').TMAjaxPost({
                        url: '<?= $this->tmpluss->getUrlAction('insert') ?>',
                        data: data,
                        processData: processData,
                        contentType: contentType,
                        success: function () {
                            add_members();
                            add_product();
                        }
                    });
                }
            }
            //return false;
        });
        //$('#btnCreate').TMCallModal();
        //$('.edit').TMCallModalEdit('<? $this->tmpluss->getUrlAction('details_modal') ?>');
    });
</script>