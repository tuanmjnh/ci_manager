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
                    <button name="create" id="btnCreate" class="btn btn-sm btn-primary col-xs-1"
                            data-toggle="modal" data-target="#general-model" data-url="<?= $this->tmpluss->getUrlAction('create_modal') ?>">
                        <?= LKEY::GET('BtnCreate') ?></button>
                    <div class="pull-right">
                        <button id="btnTrashAll" class="btn btn-sm btn-danger btnAction" 
                                data-main=".checkAll" data-item=".checkitem" 
                                data-url="<?= $this->tmpluss->getUrlAction('UpdateStatus') ?>">
                            <?= LKEY::GET('BtnDeleteAll') ?></button>
                        <button id="btnDelAll" class="btn btn-sm btn-danger btnAction ml5" 
                                data-main=".checkAll" data-item=".checkitem" 
                                data-url="<?= $this->tmpluss->getUrlAction('delete') ?>">
                            <?= LKEY::GET('BtnDeleteAll') ?></button>
                    </div>
                    <!--<button class="btn btn-link btn-xs alertTMClick pull-right"><? LKEY::GET('alert') ?> <span class="badge">1</span></button>-->
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="TMAlert" style="display:none"></div>
                <div class="TMDT">
                    <div class="btn-action pull-right">
                        <button class="btn btn-default btn-primary btn-sm" id="showing" data="1">
                            <span class="fa fa-user"></span> 
                            <?= LKEY::GET('UnLock') ?>
                        </button>
                        <button class="btn btn-default btn-sm" id="trash" data="0">
                            <span class="fa fa-user-times"></span> 
                            <?= LKEY::GET('Locked') ?>
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
            url: '<?= $this->tmpluss->getUrlAction() ?>',
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
        $('#btnCreate').TMCallModal();
        $('.edit').TMCallModalEdit('<?= $this->tmpluss->getUrlAction('details_modal') ?>');
        $.fn.TMCheckBox('.checkAll', '.checkitem', '.btnAction');
        $('.reset_password').TMConfirmAjaxPost({url: '<?= $this->tmpluss->getUrlAction('reset_password') ?>'});
    });
</script>