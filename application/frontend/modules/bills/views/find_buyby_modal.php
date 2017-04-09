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
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>#</th>
                            <th>Tên người bán</th>
                            <th>#</th>
                        </tr>
                        <?php
                        foreach (TMLib::SplitTrim(INFKEY::GET_VALUE('BillsBuyByList', '')) as $key => $value) {
                            ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                                <td><div data-dismiss="modal" value="<?= $value ?>" class="btn btn-warning btn-xs choose-buy-by"><i class="fa fa-hand-pointer-o"></i> Chọn</div></td>
                            </tr>
                        <?php } ?>
                    </table>
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
        $(document).on('click', '.choose-buy-by', function () {
            $('#buyByName').val($(this).attr('value'));
        })
    });
</script>