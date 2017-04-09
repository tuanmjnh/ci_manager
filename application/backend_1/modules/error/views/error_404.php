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
            </div>
            <!-- /#page-wrapper -->
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>
</html>