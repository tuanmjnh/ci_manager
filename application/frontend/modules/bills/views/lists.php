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
                    <a href="<?= $this->tmpluss->getUrlControl('bills', 'create') ?>" class="btn btn-sm btn-primary col-xs-1"><?= LKEY::GET('BtnCreate') ?></a>
                    <div class="pull-right">
                        <button id="btnTrashAll" class="btn btn-sm btn-danger btnAction" 
                                data-main=".checkAll" data-item=".checkitem" 
                                data-url="<?= $this->tmpluss->getUrlControl('bills', 'UpdateStatus') ?>">
                            <?= LKEY::GET('BtnDeleteAll') ?></button>
                        <button id="btnDelAll" class="btn btn-sm btn-danger btnAction ml5" 
                                data-main=".checkAll" data-item=".checkitem" 
                                data-url="<?= $this->tmpluss->getUrlControl('bills', 'delete') ?>">
                            <?= LKEY::GET('BtnDeleteAll') ?></button>
                    </div>
                    <!--<button class="btn btn-link btn-xs alertTMClick pull-right"><? LKEY::GET('alert') ?> <span class="badge">1</span></button>-->
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="alertTM alert-success" style="display:none"></div>
                <div class="TMDT">
                    <div class="btn-action pull-right">
                        <button id="paid" class="btn btn-sm data-click btn-default" name="paid_status" value="2"><?= LKEY::GET('Paid') ?></button>
                        <button id="unPaid" class="btn btn-sm data-click btn-success" name="paid_status" value="1"><?= LKEY::GET('UnPaid') ?></button>
                        <button class="btn btn-default btn-primary btn-sm" id="showing" data="1">
                            <span class="glyphicon glyphicon glyphicon-eye-open"></span> 
                            <?= LKEY::GET('Show') ?>
                        </button>
                        <button class="btn btn-default btn-sm" id="trash" data="0">
                            <span class="glyphicon glyphicon-trash"></span> 
                            <?= LKEY::GET('Trash') ?>
                        </button>
                    </div>
                    <div class="TMDT-Head pull-left col-sm-6 row mb10"></div>
                    <div class="TMDT-Body pull-left maxwidth clear table-responsive form-inline list"></div>
                    <div class="TMDT-Foot pull-left maxwidth clearfix"></div>
                </div>
            </div>
        </div><!-- /.table-responsive -->
    </div> <!-- /.col-lg-12 -->
</div><!-- /.panel -->
<script>
    $(function () {
        $('.TMDT').TMDT({
            url: '<?= $this->tmpluss->getUrlControl('bills') ?>',
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
        function checkPaid(obj, other) {
            $(obj).removeClass('btn-default').addClass('btn-success');
            $(other).removeClass('btn-success').addClass('btn-default');
        }
        $('#paid').on('click', function () {
            checkPaid(this, '#unPaid');
        });
        $('#unPaid').on('click', function () {
            checkPaid(this, '#paid');
        });
        //$('.TMDT2').TMDT();
        $('#btnCreate').TMCallModal();
        $('.edit').TMCallModalEdit('<?= $this->tmpluss->getUrlControl('bills', 'details_modal') ?>');
//        $(document).ajaxComplete(function () {
//            $(document).find('.edit')
//                    .attr('data-toggle', 'modal')
//                    .attr('data-target', '#details_modal')
//                    .attr('data-url', '')
//                    .attr('href', '#').TMCallModal({autotTarget: false});
//        });
        //$(document).find('body').append('<div id="details_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>');
        $.fn.TMCheckBox('.checkAll', '.checkitem', '.btnAction');
    });
</script>