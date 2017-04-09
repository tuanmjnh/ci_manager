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
                    <i class="fa fa-bar-chart-o fa-fw"></i>
                    <?= LKEY::GET('StatisticalList') ?>
                    <div class="pull-right">
                        <div class="dropdown-parent"></div>
<!--                        <script>
                            $(function () {
                                var data = [
                                    {title: '<? LKEY::GET('Day') ?>', icon: '', level: ''},
                                    {title: '<? LKEY::GET('Month') ?>', icon: '', level: ''},
                                    {title: '<? LKEY::GET('quy') ?>', icon: '', level: ''},
                                    {title: '<? LKEY::GET('Year') ?>', icon: '', level: ''},
                                ];
                                $('.dropdown-parent').DropdownParent({
                                    data: data,
                                    key: {
                                        title: '<? LKEY::GET('parentOriginal') ?>',
                                        icon: null,
                                        level: null
                                    },
                                    hidden: {GIParentID: 'NULL', GIParentSID: ',', level: '-1'},
                                    dHidden: {GIParentID: 'GUID', GIParentSID: 'GIParentSID|GUID', level: 'GILevel'},
                                    selected: {id: 'GIParentID', value: null, index: 0},
                                    noParent: true,
                                    classCss: ['', ''],
                                    fncSelected: function (e, a) {

                                    }
                                });
                            });
                        </script>-->
                        <div class="dropdown-parent" id="typeStatistic">
                            <div class="btn-group">
                                <a  class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <?= LKEY::GET('Day') ?> 
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#"><?= LKEY::GET('Day') ?></a></li>
                                    <li><a href="#"><?= LKEY::GET('Month') ?></a></li>
                                    <li><a href="#"><?= LKEY::GET('quy') ?></a></li>
                                    <li><a href="#"><?= LKEY::GET('Year') ?></a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--<button class="btn btn-link btn-xs alertTMClick pull-right"><? LKEY::GET('alert') ?> <span class="badge">1</span></button>-->
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="alertTM alert-success" style="display:none"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-6 row">
                            <div class="form-group">
                                <div class="input-group date" id="FDay">
                                    <span class="input-group-addon">Từ ngay:</span>
                                    <input type="text" class="form-control TMDT-Change-Refresh" name="SDate" TMDT-Change-Refresh=".TMDT"/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group date" id="LDay">
                                    <span class="input-group-addon">Đến ngay:</span>
                                    <input type="text" class="form-control" name="EDate"/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pull-right">
                            <button id="btnToday" class="btn btn-default btn-success data-main-click">Hôm nay</button>
                            <button id="btnWeek" class="btn btn-default data-main-click">Tuần</button>
                            <button id="btnMonth" class="btn btn-default data-main-click">Tháng</button>
                            <button id="btnYear" class="btn btn-default data-main-click">Năm</button>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table">
                        <tr>
                            <th><?= LKEY::GET('TotalProductsSold') ?></th>
                            <td><span id="total_item" class="bold text-danger pull-right"></span></td>
                            <td><span class="product"></span></td>
                        </tr>
                        <tr>
                            <th><?= LKEY::GET('TotalQuantitySold') ?></th>
                            <td><span id="total_quantity" class="bold text-danger pull-right"></span></td>
                            <td><span class="units"></span></td>
                        </tr>
                        <tr>
                            <th><?= LKEY::GET('TotalPrice') ?></th>
                            <td><span id="total_price" class="bold text-danger pull-right"></span></td>
                            <td><span class="rates"></span></td>
                        </tr>
                        <tr>
                            <th><?= LKEY::GET('TotalPaid') ?></th>
                            <td><span id="total_paid" class="bold text-danger pull-right"></span></td>
                            <td><span class="rates"></span></td>
                        </tr>
                        <tr>
                            <th><?= LKEY::GET('TotalUnPaid') ?></th>
                            <td><span id="total_upaid" class="bold text-danger pull-right"></span></td>
                            <td><span class="rates"></span></td>
                        </tr>
                        <tr>
                            <th><?= LKEY::GET('TotalBillPaid') ?></th>
                            <td><span id="total_bill_paid" class="bold text-danger pull-right"></span></td>
                            <td><span class="bills"></span></td>
                        </tr>
                        <tr>
                            <th><?= LKEY::GET('TotalBillUnPaid') ?></th>
                            <td><span id="total_bill_upaid" class="bold text-danger pull-right"></span></td>
                            <td><span class="bills"></span></td>
                        </tr>
                    </table>
                    <div class="TMDT">
                        <div class="btn-action pull-right">
<!--                            <button id="paid" class="btn btn-sm data-click btn-default" name="paid_status" value="2"><? LKEY::GET('Paid') ?></button>
                            <button id="unPaid" class="btn btn-sm data-click btn-success" name="paid_status" value="1"><? LKEY::GET('UnPaid') ?></button>-->
                            <!--                            <button class="btn btn-default btn-primary btn-sm" id="showing" data="1">
                                                            <span class="glyphicon glyphicon glyphicon-eye-open"></span> 
                                                            <? LKEY::GET('Show') ?>
                                                        </button>
                                                        <button class="btn btn-default btn-sm" id="trash" data="0">
                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                            <? LKEY::GET('Trash') ?>
                                                        </button>-->
                        </div>
                        <div class="TMDT-Head pull-left col-sm-6 row mb10"></div>
                        <div class="TMDT-Body pull-left maxwidth clear table-responsive form-inline list"></div>
                        <div class="TMDT-Foot pull-left maxwidth clearfix"></div>
                    </div>
                    <div class="TMDT-Product">
                        <div class="TMDT-Head pull-left col-sm-6 row mb10"></div>
                        <div class="TMDT-Body pull-left maxwidth clear table-responsive form-inline list"></div>
                        <div class="TMDT-Foot pull-left maxwidth clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!-- /.table-responsive -->
    </div> <!-- /.col-lg-12 -->
</div><!-- /.panel -->
<!--<span id="tmtest">tuanmjnh</span>
<span id="tmtest2">tuanmjnh</span>-->
<script>
    //window.onload = get_bill_statistic(null, null);
    $(function () {
        $('#tmtest').on('click', function () {
            $(this).tmtest({id: 'tuanmjnh1', value: 'tm1'});
        });
        $('#tmtest2').on('click', function () {
            $(this).tmtest({id: 'tuanmjnh2', value: 'tm2'});
        });
        function first_load() {
            $('#btnToday').attr('value', 'SDate=' + moment().format('YYYY/MM/DD') + '|EDate=' + moment().format('YYYY/MM/DD'));
            $('#btnWeek').attr('value', 'SDate=' + moment().startOf('week').format("YYYY/MM/DD") + '|EDate=' + moment().endOf('week').format("YYYY/MM/DD"));
            $('#btnMonth').attr('value', 'SDate=' + moment().startOf('month').format("YYYY/MM/DD") + '|EDate=' + moment().endOf('month').format("YYYY/MM/DD"));
            $('#btnYear').attr('value', 'SDate=' + moment().startOf('year').format("YYYY/MM/DD") + '|EDate=' + moment().endOf('year').format("YYYY/MM/DD"));
        }
        first_load();
        function convert_date(val) {
            val = val.split('/');
            return val[2] + '/' + val[1] + '/' + val[0];
        }
        $.fn.get_bill_statistic = function (sd, ed) {
            var data = {};
            if (sd == null && ed == null)
                sd = ed = moment().format('DD/MM/YYYY');
            data = {
                SDate: convert_date(sd),
                EDate: convert_date(ed)};
//            data = convert_date(sd, ed);
            $(this).TMAjaxPost({
                url: '<?= $this->tmpluss->getUrlAction('get_bill_statistic') ?>',
                data: data,
                processData: true,
                contentType: 'application/x-www-form-urlencoded',
                success: function (d) {
                    d = JSON.parse(d);
                    $('#total_item').html(isUndefined(d.total_item, 0)).number(true, 0);
                    $('#total_quantity').html(isUndefined(d.total_quantity, 0)).number(true, 0);
                    $('#total_price').html(isUndefined(d.total_price, 0)).number(true, 0);
                    $('#total_paid').html(isUndefined(d.total_paid, 0)).number(true, 0);
                    $('#total_upaid').html(isUndefined(d.total_upaid, 0)).number(true, 0);
                    $('#total_bill_paid').html(isUndefined(d.total_bill_paid, 0)).number(true, 0);
                    $('#total_bill_upaid').html(isUndefined(d.total_bill_upaid, 0)).number(true, 0);
                    $('.product').html(' (<?= LKEY::GET('Product') ?>)');
                    $('.units').html(' (<?= LKEY::GET('Units') ?>)');
                    $('.rates').html(' (<?= LKEY::GET('rates') ?>)');
                    $('.bills').html(' (<?= LKEY::GET('Bills') ?>)');
                }});
        };
        $(document).get_bill_statistic(null, null);
        $('.TMDT').TMDT({
                url: '<?= $this->tmpluss->getUrlAction() ?>',
                urlData: 'data',
                Command: false,
                CheckBox: false,
                PPrewText: '<?= LKEY::GET('PagePrev') ?>',
                PNextText: '<?= LKEY::GET('PageNext') ?>',
                CTitleText: '<?= LKEY::GET('ConfirmTitle') ?>',
                COkText: '<?= LKEY::GET('ConfirmOk') ?>',
                CCancelText: '<?= LKEY::GET('ConfirmCancel') ?>',
                SearchText: '<?= LKEY::GET('SearchPlaceholder') ?>',
                RecordText: '<?= LKEY::GET('TableRecordText') ?>',
                RecordTitle: '<?= LKEY::GET('TableRecordTextTitle') ?>',
                InfText: '<?= LKEY::GET('TableInf') ?>',
                btnTrashText: '<?= LKEY::GET('BtnDeleteAll') ?>',
                btnRecoverText: '<?= LKEY::GET('BtnRecoverAll') ?>'
            });
            $('.TMDT-Product').TMDT({
                url: '<?= $this->tmpluss->getUrlAction() ?>',
                urlData: 'data_item'
            });
        $.fn.TMDT_Change_Date = function () {
            var sd = convert_date($('#FDay input').val());
            var ed = convert_date($('#LDay input').val());
            $('.TMDT').TMDT({url: '<?= $this->tmpluss->getUrlAction() ?>', urlData: 'data',
                orther: '&SDate=' + sd + '&EDate=' + ed});
            $('.TMDT-Product').TMDT({url: '<?= $this->tmpluss->getUrlAction() ?>', urlData: 'data_item',
                orther: '&SDate=' + sd + '&EDate=' + ed});
            
            //$(this).tmtest({id:'tuanmjnh',value:'tm'});
        };
        $('#typeStatistic').SelectDropdownParent({fncSelected: function (e, a) {
                console.log(a);
            }});
        var datetimepickerTooltip = {
            today: 'Go to today',
            clear: 'Clear selection',
            close: 'Close the picker',
            selectMonth: 'Select Month',
            prevMonth: 'Previous Month',
            nextMonth: 'Next Month',
            selectYear: 'Select Year',
            prevYear: 'Previous Year',
            nextYear: 'Next Year',
            selectDecade: 'Select Decade',
            prevDecade: 'Previous Decade',
            nextDecade: 'Next Decade',
            prevCentury: 'Previous Century',
            nextCentury: 'Next Century'
        };
        function selectActive(obj) {
            var cl = 'btn-success';
            var bl = 'border-success';
            $('#btnToday').removeClass(cl);
            $('#btnWeek').removeClass(cl);
            $('#btnMonth').removeClass(cl);
            $('#btnYear').removeClass(cl);
            $('#FDay input').removeClass(bl);
            $('#LDay input').removeClass(bl);
            if (obj !== 'group')
                $(obj).addClass(cl);
            else {
                $('#FDay input').addClass(bl);
                $('#LDay input').addClass(bl);
            }
        }
        $('#FDay').datetimepicker({
            defaultDate: moment().format('YYYY-MM-DD 00:00:00'),
            tooltips: datetimepickerTooltip,
            format: 'DD/MM/YYYY',
            allowInputToggle: true});
        $('#LDay').datetimepicker({
            defaultDate: moment().format('YYYY-MM-DD 23:59:59'),
            tooltips: datetimepickerTooltip,
            format: 'DD/MM/YYYY',
            allowInputToggle: true});
        $('#FDay').on('dp.change', function (e) {
            $(document).get_bill_statistic($('#FDay input').val(), $('#LDay input').val());
            selectActive('group');
            //TMDT.refresh();
            $(document).TMDT_Change_Date();
            //window.location = CurrentUrl + '?sd=' + $('#FDay input').val() + '&ed=' + $('#LDay input').val();
            //console.log(CurrentUrl);
        });
        $('#LDay').on('dp.change', function (e) {
            $(document).get_bill_statistic($('#FDay input').val(), $('#LDay input').val());
            selectActive('group');
            $(document).TMDT_Change_Date();
        });
        $('#btnToday').on('click', function () {
            $(document).get_bill_statistic(null, null);
            selectActive(this);
        });
        $('#btnWeek').on('click', function () {
            $(document).get_bill_statistic(moment().startOf('week').format("DD/MM/YYYY"), moment().endOf('week').format("DD/MM/YYYY"));
            selectActive(this);
        });
        $('#btnMonth').on('click', function () {
            $(document).get_bill_statistic(moment().startOf('month').format("DD/MM/YYYY"), moment().endOf('month').format("DD/MM/YYYY"));
            selectActive(this);
        });
        $('#btnYear').on('click', function () {
            $(document).get_bill_statistic(moment().startOf('year').format("DD/MM/YYYY"), moment().endOf('year').format("DD/MM/YYYY"));
            selectActive(this);
        });

    });
</script>