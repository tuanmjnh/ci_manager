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
                    <input id="GUID" type="hidden" name="GUID" value="<?= isset($d->GUID) ? $d->GUID : NULL ?>">
                    <table class="table-details" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('BillsBuyBy') ?></th>
                                <td class="form-group">
                                    <span><?= isset($d->GVTitle) ? $d->GVTitle : NULL ?></span>
                                </td>
                                <th><?= LKEY::GET('Status') ?></th>
                                <td class="form-group">
                                    <div class="fix-check list-check">
                                        <label>
                                            <input class="flag_bills" type="radio" name="GILevel" value="1" 
                                                   <?= isset($d->GILevel) && $d->GILevel == '1' ? 'checked' : NULL ?>> 
                                                   <?= LKEY::GET('UnPaid') ?>
                                        </label>
                                        <label>
                                            <input class="flag_bills" type="radio" name="GILevel" value="2" 
                                                   <?= isset($d->GILevel) && $d->GILevel == '2' ? 'checked' : NULL ?>> 
                                                   <?= LKEY::GET('Paid') ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('membersName') ?></th>
                                <td class="form-group">
                                    <span><?= isset($d->SeoLinkSearch) ? $d->SeoLinkSearch : NULL ?></span>
                                </td>
                                <th><?= LKEY::GET('Mobile') ?></th>
                                <td class="form-group">
                                    <span><?= isset($d->SeoKeyword) ? $d->SeoKeyword : NULL ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Address') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea readonly="" class="form-control" placeholder="<?= LKEY::GET('Placeholder|Address') ?>"
                                              ><?= isset($d->SeoDesc) ? $d->SeoDesc : NULL ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('Description') ?></th>
                                <td colspan="3" class="form-group">
                                    <textarea readonly="" class="form-control" placeholder="<?= LKEY::GET('Placeholder|Description') ?>"
                                              ><?= isset($d->GVDesc) ? $d->GVDesc : NULL ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="padding-left:0px">
                                    <div class="col-lg-12" style="overflow-x:scroll"><!-- width:1000px; -->
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?= LKEY::GET('ProductTitle') ?></th>
                                                    <th><?= LKEY::GET('ProductCode') ?></th>
                                                    <th><?= LKEY::GET('Color') ?></th>
                                                    <th><?= LKEY::GET('Size') ?></th>
                                                    <th><?= LKEY::GET('Quantity') ?></th>
                                                    <th><?= LKEY::GET('ProductFPrice') ?> (<?= LKEY::GET('rates') ?>)</th>
                                                    <th><?= LKEY::GET('Discount') ?></th>
                                                    <th><?= LKEY::GET('ProductLPrice') ?> (<?= LKEY::GET('rates') ?>)</th>
                                                    <th><?= LKEY::GET('Total') ?> (<?= LKEY::GET('rates') ?>)</th>
                                                    <th><?= LKEY::GET('ProductAttach') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($d->products as $key => $value) { ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= isset($value->IVContent) ? $value->IVContent : NULL ?></td>
                                                        <td><?= isset($value->IVKey) ? $value->IVKey : NULL ?></td>
                                                        <td><?= isset($value->SeoLinkSearch) && $value->SeoLinkSearch != '' ? $value->SeoLinkSearch : LKEY::GET('empty') ?></td>
                                                        <td><?= isset($value->SeoKeyword) && $value->SeoLinkSearch != '' ? $value->SeoKeyword : LKEY::GET('empty') ?></td>
                                                        <td><?= isset($value->IVImages) ? $value->IVImages : NULL ?></td>
                                                        <td><?= isset($value->IFFPrice) ? number_format($value->IFFPrice) : NULL ?></td>
                                                        <td><?= isset($value->IVUrl) ? $value->IVUrl : NULL ?> %</td>
                                                        <td><?= isset($value->IFLPrice) ? number_format($value->IFLPrice) : NULL ?></td>
                                                        <td><?= isset($value->SeoDesc) ? number_format($value->SeoDesc) : NULL ?></td>
                                                        <td><?= 'Không'//isset($value->IVAuthor) ? $value->IVAuthor : NULL         ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="7"><b><?= LKEY::GET('TotalPrice') ?></b></td>
                                                    <td colspan="4"><?= isset($d->SeoLink) ? number_format($d->SeoLink) . ' ' . LKEY::GET('rates') : NULL ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7"><b><?= LKEY::GET('Paid') ?></b></td>
                                                    <td colspan="4"><?= isset($d->SeoPlus) ? number_format($d->SeoPlus) . ' ' . LKEY::GET('rates') : NULL ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7"><b><?= LKEY::GET('TotalUnPaid') ?></b></td>
                                                    <td colspan="4"><?= isset($d->SeoLang) ? number_format($d->SeoLang) . ' ' . LKEY::GET('rates') : NULL ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
        $('.flag_bills').click(function (e) {
            $(this).TMSingleAjaxPost({url: '<?= $this->tmpluss->getUrlAction('update_paid') ?>',
                data: {id: $('#GUID').val(), flag: $(this).val()}});
        });
    });
</script>