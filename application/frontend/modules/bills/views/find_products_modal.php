<form id="form_products" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
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
                    <div class="has-feedback has-error">
                        <label id="products[]-error" class="error" for="products[]"></label>
                    </div>
                    <div class="TMDT">
                        <div class="TMDT-Head pull-left col-sm-6 row mb10"></div>
                        <div class="TMDT-Body pull-left maxwidth clear table-responsive form-inline list"></div>
                        <div class="TMDT-Foot pull-left maxwidth clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="SelectProduct" type="button" value="1" class="btn btn-primary"><?= LKEY::GET('BtnCreate') ?></button>
                <button type="button" id="cancel-model" class="btn btn-default" data-dismiss="modal">
                    <?= LKEY::GET('BtnCancel') ?></button>
            </div>
        </div>
    </div>
</form>
<script>
    $(function () {
        $('.TMDT').TMDT({
            url: '<?= $this->tmpluss->getUrlAction() ?>',
            urlData: 'data_products',
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
        $("#form_products").validate({
            rules: {
                'products[]': 'required',
            },
            messages: {
                'products[]': '<?= LKEY::GET('plsChoose|MenuMProduct') ?>',
            },
            success: function (e) {
                $(e).ValidateError({iconSuccess: false, iconError: false});
            },
            highlight: function (e, r) {
                $(e).ValidateError({iconSuccess: false, iconError: false});
            }
        });
        $('#SelectProduct').on('click', function () {
            if ($('#form_products').valid()) {
                //var data = {id: ArrayToStr($(":input[type=checkbox]").serializeArray(), '|')};
                var tmp = $(":input[type=checkbox]").serializeArray();
                var data = {};
                for (var i = 0; i < tmp.length; i++) {
                    data[i] = tmp[i].value;
                }
                //console.log(data);
                $('#form_products').TMAjax({
                    url: '<?= $this->tmpluss->getUrlAction('get_products') ?>',
                    data: data,
                    success: function (d) {
                        d = JSON.parse(d);
                        products = [];
                        SelectProduct(d);
                        jsonProduct = d;
                    }
                });
            }
        });
    });
</script>