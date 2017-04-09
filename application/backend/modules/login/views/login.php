<!DOCTYPE HTML>
<html>
    <head>
        <title><?= $pTitle ?></title>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- icon page -->
        <?= isset($icon) ? $icon : '' ?>
        <!-- Core CSS - Include with every page -->
        <?= isset($css) ? implode($css) : '' ?>
        <!-- Core Scripts - Include with every page -->
        <?= isset($js) ? implode($js) : '' ?>
    </head>
    <body>
        <!-- contact-form -->	
        <div class="message warning">
            <div class="inset">
                <div class="login-head">
                    <h1><?= $pTitle ?></h1>
                </div>
                <form id="login-form">
                    <div class="TMAlert"></div>
                    <div id="p-account">
                        <li>
                            <label for="account" class="glyphicon glyphicon-user"></label><input type="text" id="account" name="account" class="text" placeholder="<?= LKEY::GET('accountName') ?>">
                        </li>
                        <label id="account-error" class="error" for="account"></label>
                    </div>
                    <div class="clear"></div>
                    <div id="p-password">
                        <li>
                            <label for="password" class="glyphicon glyphicon-lock"></label><input type="password" id="password" name="password" placeholder="<?= LKEY::GET('accountPassword') ?>">
                        </li>
                        <label id="password-error" class="error" for="password"></label>
                    </div>
                    <div class="clear"></div>
                    <div class="remember">
                        <label><input type="checkbox" name="remember"><?= LKEY::GET('loginRemember') ?></label>
                        <a href="#"><?= LKEY::GET('forgotPassword') ?></a>
                    </div>
                    <div class="clear"></div>
                    <button id="login-submit" class="submit btn"><?= LKEY::GET('login') ?></button>
                </form>
            </div>
        </div>
        <div class="clear"></div>
        <!--- footer --->
        <div class="footer">
            <p><?= LKEY::GET('CMSPTitle') ?> <a href="<?= TM_BASE_URL . 'cms' ?>">Webshop</a></p>
        </div>
        <script>
            $(function () {
                $("#login-form").validate({
                    rules: {
                        account: {required: true, minlength: 4, maxlength: 32, alpha_numeric: true},
                        password: {required: true, minlength: 4, maxlength: 32}
                    },
                    messages: {
                        account: {
                            required: '<?= LKEY::GET('plsEnter|accountName') ?>',
                            minlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                                    .StringFormat(['<?= LKEY::GET('accountName') ?>', 4, 32]),
                            maxlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                                    .StringFormat(['<?= LKEY::GET('accountName') ?>', 4, 32]),
                            alpha_numeric: '<?= LKEY::GET('msgAlphaNumericError') ?>'
                                    .StringFormat('<?= LKEY::GET('accountName') ?>')
                        },
                        password: {
                            required: '<?= LKEY::GET('plsEnter|accountPassword') ?>',
                            minlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                                    .StringFormat(['<?= LKEY::GET('accountPassword') ?>', 4, 32]),
                            maxlength: '<?= LKEY::GET('msgMinMaxLengthError') ?>'
                                    .StringFormat(['<?= LKEY::GET('accountPassword') ?>', 4, 32])}
                    },
                    success: function (e) {
                        $(e).ValidateSuccess({iconSuccess: false})
                    },
                    highlight: function (e, r) {
                        $(e).ValidateError({fixList: [
                                {name: 'account', parent: '#p-account'},
                                {name: 'password', parent: '#p-password'}]})
                    }
                });
                $('#login-submit').click(function (e) {
                    if ($('#login-form').valid())
                        $('#login-form').TMAjaxPost({url: '<?= $this->tmpluss->getUrlAction('logging') ?>',
                            reset: false, alHidden: false, alRemove: false, alCSS: 'login-alert alert-danger', alClose: false,
                            success: function () {
                                $('#password').val('')
                            }
                        });
                    return false;
                });
            });
        </script>
    </body>
</html>