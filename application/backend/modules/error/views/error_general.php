<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= isset($pTitle) ? $pTitle : NULL ?></title>
        <!-- icon page -->
        <?= isset($icon) ? $icon : NULL ?>
        <!-- Core CSS - Include with every page -->
        <?= isset($css) ? implode($css) : NULL ?>
        <!-- Core Scripts - Include with every page -->
        <?= isset($js) ? implode($js) : NULL ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="page-wrapper">
                <div class="main">
                    <b class="title"><?= isset($title) ? $title : NULL ?></b>
                    <p class="details"><?= isset($details) ? $details : NULL ?></p>
                    <a href="javascript:history.go(-1)" onclick=""><?= LKEY::GET('BtnBack') ?></a>
                </div>
                <div>
                    <form class="search">
                        <input type="text" class="col-md-10 col-xs-12" 
                               placeholder="<?= LKEY::GET('SearchPlaceholder') ?>">
                        <button class="btn col-md-2 col-xs-12"><?= LKEY::GET('SearchText') ?></button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>