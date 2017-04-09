<form id="form_members" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
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
                    <div class="TMDT">
                        <div class="TMDT-Head pull-left col-sm-6 row mb10"></div>
                        <div class="TMDT-Body pull-left maxwidth clear table-responsive form-inline list"></div>
                        <div class="TMDT-Foot pull-left maxwidth clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--                <button type="button" id="addNew" name="addNew" value="1" class="btn btn-primary">
                                    <? LKEY::GET('BtnCreate') ?></button>-->
                <button type="button" id="cancel-model" class="btn btn-default"  data-dismiss="modal">
                    <?= LKEY::GET('BtnCancel') ?></button>
            </div>
        </div>
    </div>
</form>
<script>
    $(function () {
        $('.TMDT').TMDT({
            url: '<?= $this->tmpluss->getUrlAction() ?>',
            urlData: 'data_members',
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
        $(document).ajaxComplete(function () {
            $(document).find('.choose-items').TMAjax({
                url: '<?= $this->tmpluss->getUrlAction('get_members') ?>',
                success: function (d) {
                    d = JSON.parse(d);
                    members = {
                        id: d.MBVID,
                        membersName: d.MBVPropertyNames,
                        mobile: d.MBVMobile,
                        address: d.MBVAddress,
                        discount: d.membersDiscount
                    };
                    $('#membersName').attr('readonly', 'readonly').val(members.membersName);
                    $('#Mobile').attr('readonly', 'readonly').val(members.mobile);
                    $('#Address').attr('readonly', 'readonly').val(members.address);
                    tinyMCE.get('Address').setContent(members.address);
                    $('#membersType').children().attr('class', d.membersIcon);
                    $('#membersDiscount').html(members.discount + ' %');
                    if (jsonProduct != null)
                        SelectProduct(jsonProduct);
                }
            });
        });
    });
</script>