<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $pTitle ?></title>
        <!-- icon page -->
        <?= $icon ?>
        <!-- Core CSS - Include with every page -->
        <?= isset($css) ? implode($css) : NULL ?>
        <?= isset($_css) ? implode($_css) : NULL ?>
        <!-- Core Scripts - Include with every page -->
<!--        <? $this->load->view('initialization_lang', NULL, TRUE) ?>-->
        <?php isset($js) ? implode($js) : NULL ?>
        <?php isset($_js) ? implode($_js) : NULL ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
            //$this->load->load_file('../backend/language');
            //$this->load->model('../backend/mdl_language');
            //Modules::load_file('mdl_language',  CI::$APP->router->directory.'backend/language/');
            //echo APPPATH . '../backend/modules/language/models/mdl_language.php';
            //print_r($this->load->modelApp('mdl_language','backend'));
            $this->load->add_package_path(APPPATH . 'backend', FALSE);
            echo APPPATH.'../backend/modules/language/models/mdl_language'.EXT;
            $this->load->model(APPPATH.'../backend/modules/language/models/mdl_language');
            ?>
            LKEY::GET('tm')
            <?= $this->load->view('header', NULL, TRUE) ?>
            <?= $this->load->view('menu', NULL, TRUE) ?>
            <div id="page-wrapper">
                <?php echo $content; ?>
            </div>
            <!-- /#page-wrapper -->
            <?= $this->load->view('footer', NULL, TRUE) ?>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>
</html>
