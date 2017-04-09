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
        <form id="form_inf_main" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
            <div class="panel panel-default panel-customer">
                <div class="panel-heading"><?= LKEY::GET('InforMain') ?></div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="alertTM alert-success" style="display:none"></div>
                    <div class="table-responsive">
                        <div class="TMAlert"></div>
                        <table class="table-details" align="center">
                            <tbody>
                                <tr>
                                    <th><?= LKEY::GET('InforCompanyName') ?></th>
                                    <td class="form-group">
                                        <input name="CompanyName" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('companyname', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder|InforCompanyName') ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= LKEY::GET('Mobile') ?></th>
                                    <td class="form-group">
                                        <input name="Mobile" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('mobile', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder|Mobile') ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= LKEY::GET('Hotline') ?></th>
                                    <td class="form-group">
                                        <input name="Hotline" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('hotline', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder|Hotline') ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= LKEY::GET('Address') ?></th>
                                    <td class="form-group">
                                        <input name="Address" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('address', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder|Address') ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>Slogan</th>
                                    <td class="form-group">
                                        <input name="Slogan" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('slogan', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder') ?> Slogan" >
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= LKEY::GET('Email') ?></th>
                                    <td class="form-group">
                                        <input name="Email" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('email', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder|Email') ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>Facebook</th>
                                    <td class="form-group">
                                        <input name="Facebook" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('facebook', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder') ?> Facebook" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>Google +</th>
                                    <td class="form-group">
                                        <input name="GooglePlus" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('googleplus', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder') ?> Google +" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>Skype</th>
                                    <td class="form-group">
                                        <input name="Skype" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('skype', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder') ?> Skype" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>Yahoo!</th>
                                    <td class="form-group">
                                        <input name="Yahoo" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('yahoo', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder') ?> Yahoo!" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>Twitter</th>
                                    <td class="form-group">
                                        <input name="Twitter" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('twitter', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder') ?> Twitter" >
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= LKEY::GET('ClassIcon') ?></th>
                                    <td class="form-group">
                                        <input name="ClassIcon" type="text" class="form-control" 
                                               value="<?= INFKEY::GET_VALUE('ClassIcon', '') ?>" 
                                               placeholder="<?= LKEY::GET('Placeholder|ClassIcon') ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= LKEY::GET('InforContentContacts') ?></th>
                                    <td class="form-group">
                                        <textarea id="ContentContacts" name="ContentContacts" class="form-control TinymceEditor" 
                                                  placeholder="<?= LKEY::GET('Placeholder|InforContentContacts') ?>"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= LKEY::GET('InforDesc') ?></th>
                                    <td class="form-group">
                                        <textarea id="Description" name="Description" class="form-control TinymceEditor" 
                                                  placeholder="<?= LKEY::GET('Placeholder|InforDesc') ?>"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Logo</th>
                                    <td class="form-group"><input id="ImageFiles" name="ImageFiles" type="file"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" id="addNewMain" name="addNew" value="1" class="btn btn-primary btnAddNew">
                        <?= LKEY::GET('BtnUpdate') ?></button>
                </div>
            </div><!-- /.table-responsive -->
        </form>
        <form id="form_inf_sub" action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
            <div id="infor-sub-main" class="panel panel-info panel-customer">
                <div class="panel-heading"><?= LKEY::GET('InforSubBills') ?></div>
                <div class="panel-body">
                    <table class="table-details infor-sub-item" align="center">
                        <tbody>
                            <tr>
                                <th><?= LKEY::GET('InforSubBillsTopLeft') ?></th>
                                <td class="form-group">
                                    <textarea id="BillsTopLeft" name="BillsTopLeft" class="form-control TinymceEditor" 
                                              placeholder="<?= LKEY::GET('Placeholder|InforSubBillsTopLeft') ?>"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('InforSubBillsTopRight') ?></th>
                                <td class="form-group">
                                    <textarea id="BillsTopRight" name="BillsTopRight" class="form-control TinymceEditor" 
                                              placeholder="<?= LKEY::GET('Placeholder|InforSubBillsTopRight') ?>"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><?= LKEY::GET('InforSubBillsNote') ?></th>
                                <td class="form-group">
                                    <textarea id="BillsNote" name="BillsNote" class="form-control TinymceEditor" 
                                              placeholder="<?= LKEY::GET('Placeholder|InforSubBillsNote') ?>"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <button type="button" id="addNewSub" name="addNew" value="1" class="btn btn-primary btnAddNew">
                        <?= LKEY::GET('BtnUpdate') ?></button>
                </div>
            </div>
        </form>
    </div> <!-- /.col-lg-12 -->
</div><!-- /.panel -->
<script>
    $(function () {
        tinymce.init({
            selector: '.TinymceEditor',
            //theme: "modern",
            entity_encoding: "raw",
            //apply_source_formatting: true,
            //entities: '169,copy,8482,trade,ndash,8212,mdash,8216,lsquo,8217,rsquo,8220,ldquo,8221,rdquo,8364,euro',
            //mode: "exact",
            menubar:false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "insertfile undo redo | fontselect fontsizeselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
            toolbar2: "link image | print preview media | forecolor backcolor emoticons",
            image_advtab: true,
//            templates: [
//                {title: 'Test template 1', content: 'Test 1'},
//                {title: 'Test template 2', content: 'Test 2'}
//            ]
        });
        $("#ContentContacts").val(<?= json_encode(INFKEY::GET_VALUE('ContentContacts', '')) ?>);
        $("#Description").val(<?= json_encode(INFKEY::GET_VALUE('Description', '')) ?>);
        $("#BillsTopLeft").val(<?= json_encode(INFKEY::GET_VALUE('BillsTopLeft', '')) ?>);
        $("#BillsTopRight").val(<?= json_encode(INFKEY::GET_VALUE('BillsTopRight', '')) ?>);
        $("#BillsNote").val(<?= json_encode(INFKEY::GET_VALUE('BillsNote', '')) ?>);
        $('#addNewMain').on('click', function () {
            var data = serializeArrayToObject($('#form_inf_main').serializeArray());
            data.ContentContacts = tinyMCE.get('ContentContacts').getContent();
            data.Description = tinyMCE.get('Description').getContent();
            console.log(data);
            $('#form_inf_main').TMAjaxPost({
                url: '<?= $this->tmpluss->getUrlAction('insert') ?>',
                data: data,
                processData: true,
                contentType: 'application/x-www-form-urlencoded',
                success: function (d) {
                    //console.log(d);
                }
            });
        })
        $('#addNewSub').on('click', function () {
            var data = serializeArrayToObject($('#form_inf_sub').serializeArray());
            data.BillsTopLeft = tinyMCE.get('BillsTopLeft').getContent();
            data.BillsTopRight = tinyMCE.get('BillsTopRight').getContent();
            data.BillsNote = tinyMCE.get('BillsNote').getContent();
            console.log(data);
            $('#form_inf_sub').TMAjaxPost({
                url: '<?= $this->tmpluss->getUrlAction('insert') ?>',
                data: data,
                processData: true,
                contentType: 'application/x-www-form-urlencoded',
                success: function (d) {
                    //console.log(d);
                }
            });
            //console.log(tinyMCE.get('ContentContacts').getContent());
        })
    });
</script>