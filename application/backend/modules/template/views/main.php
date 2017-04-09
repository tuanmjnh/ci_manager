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
        <?= isset($_css) ? implode($_css) : NULL ?>
        <!-- Core Scripts - Include with every page -->
<!--        <? $this->load->view('initialization_lang', NULL, TRUE) ?>-->
        <?= isset($js) ? implode($js) : NULL ?>
        <?= isset($_js) ? implode($_js) : NULL ?>
    </head>
    <body>
        <div id="wrapper">
            <?= $this->load->view('header', NULL, TRUE) ?>
            <?= $this->load->view('menu', NULL, TRUE) ?>
            <div id="page-wrapper">
                <?= isset($content) ? $content : NULL ?>
            </div>
            <!-- /#page-wrapper -->
            <?= $this->load->view('footer', NULL, TRUE) ?>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>
</html>
