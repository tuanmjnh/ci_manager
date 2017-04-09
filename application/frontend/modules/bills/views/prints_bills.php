<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= LKEY::GET('PrintBillsPTitle') ?></title>
        <!-- icon page -->
        <?= isset($icon) ? $icon : NULL ?>
        <!-- Core CSS - Include with every page -->
        <?= isset($_css) ? implode($_css) : NULL ?>
        <!-- Core Scripts - Include with every page -->
        <?= isset($_js) ? implode($_js) : NULL ?>
    </head>
    <body>
        <div class="container"><br/></div>
        <div class="container">
            <div class="row">
                <div style="width:50%;float:left">
                    <div style="margin-left:15px">
                        <?= INFKEY::GET_VALUE('BillsTopLeft', '') ?>
                    </div>
                </div>
                <div style="width:50%;float:left">
                    <?= INFKEY::GET_VALUE('BillsTopRight', '') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center"><h3>Biên nhận</h3></div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <table>
                        <tr>
                            <td class="col-md-3"><?= LKEY::GET('BillsTitle') ?>:</td>
                            <td id="BillsCode" class="text-danger"></td>
                        </tr>
                         <tr>
                            <td class="col-md-3"><?= LKEY::GET('BillsPeopleBy') ?>:</td>
                            <td id="BillsPeopleBy"></td>
                        </tr>
                         <tr>
                            <td class="col-md-3"><?= LKEY::GET('Address') ?>:</td>
                            <td id="Address"></td>
                        </tr>
                         <tr>
                            <td class="col-md-3"><?= LKEY::GET('Mobile') ?>:</td>
                            <td id="Mobile"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-12 table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th><?= LKEY::GET('ProductTitle') ?></th>
                                <th><?= LKEY::GET('ProductCode') ?></th>
                                <th><?= LKEY::GET('Color') ?></th>
                                <th><?= LKEY::GET('Size') ?></th>
                                <th class="col-md-1"><?= LKEY::GET('Quantity') ?></th>
                                <th><?= LKEY::GET('ProductFPrice') ?> (<?= LKEY::GET('rates') ?>)</th>
                                <th><?= LKEY::GET('Discount') ?></th>
                                <th><?= LKEY::GET('ProductLPrice') ?> (<?= LKEY::GET('rates') ?>)</th>
                                <th><?= LKEY::GET('Total') ?> (<?= LKEY::GET('rates') ?>)</th>
<!--                                <th><? LKEY::GET('ProductAttach') ?></th>-->
                            </tr>
                        </thead>
                        <tbody id="products">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pull-right">
                        <div><label><?= LKEY::GET('BillsBuyBy') ?></label></div>
                        <div id="BillsBuyBy"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <?= INFKEY::GET_VALUE('BillsNote', '') ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="test"></div>
    </body>
</html>

<script>
    $(function () {
        var data_bills = JSON.parse($.cookie('data_bills'));
        console.log(data_bills);
        if (data_bills !== null) {
            $('#BillsCode').html(data_bills.BillsCode.replace(/"/g,''));
            $('#BillsPeopleBy').html(data_bills.members.membersName);
            $('#Address').html(data_bills.members.address);
            $('#Mobile').html(data_bills.members.mobile);
            $('#BillsBuyBy').html(data_bills.members.buyBy);
            var rs = '';
            for (var i = 0; i < data_bills.products.length; i++) {
                rs += '<tr>';
                rs += '<td>' + (i + 1) + '</td>';
                rs += '<td>' + data_bills.products[i].name + '</td>';
                rs += '<td>' + data_bills.products[i].key + '</td>';
                rs += '<td>' + isUndefined(data_bills.products[i].color, '<?= LKEY::GET('empty') ?>') + '</td>';
                rs += '<td>' + isUndefined(data_bills.products[i].size, '<?= LKEY::GET('empty') ?>') + '</td>';
                rs += '<td>' + data_bills.products[i].quantity + '</td>';
                rs += '<td>' + data_bills.products[i].fPrice + '</td>';
                rs += '<td>' + data_bills.products[i].discount + '</td>';
                rs += '<td>' + data_bills.products[i].lPrice + '</td>';
                rs += '<td>' + data_bills.products[i].total + '</td>';
                //rs += '<td>' + data_bills.products[i].attach + '</td>';
                rs += '</tr>';
            }
            rs += '<tr>' +
                    '<td colspan="7"><b><?= LKEY::GET('TotalPrice') ?></b></td>' +
                    '<td colspan="4"><span id="TotalPrice">' + data_bills.total.TotalPrice + '</span> <?= LKEY::GET('rates') ?></td>' +
                    '</tr>';
            rs += '<tr>' +
                    '<td colspan="7"><b><?= LKEY::GET('Paid') ?></b></td>' +
                    '<td colspan="4"><span id="TotalPrice">' + data_bills.total.Paid + '</span> <?= LKEY::GET('rates') ?></td>' +
                    '</tr>';
            rs += '<tr>' +
                    '<td colspan="7"><b><?= LKEY::GET('UnPaid') ?></b></td>' +
                    '<td colspan="4"><span id="TotalUnPaid">' + data_bills.total.TotalUnPaid + '</span> <?= LKEY::GET('rates') ?></td>' +
                    '</tr>';
            $('#products').html(rs);
            window.print();
        }
    });
</script>