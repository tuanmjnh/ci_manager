<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{page_title}</title>
<!--        <style type="text/css" media="all">@import url("/asset/css/css.css");</style>-->
        <link href="<?=base_url()?>assets/css/css.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <h1>Welcome to CodeIgniter!</h1>
            <div id="body">
                <h3>{heading}</h3>
                <p>{body}</p>
                <p>{entries}</p>
                <div class="tm"></div>
                <?php 
                echo site_url("tpl_whiteBlue")."</br />";
                echo base_url("tpl_whiteBlue")."</br />";
                echo index_page()."</br />";
                echo anchor('tpl_whiteBlue', 'tpl_whiteBlue', array('title' => 'tpl_whiteBlue!'));
                //getcwd() get curent path
                //redirect('account', 'refresh');
                //redirect('account', 'location', 301);
                ?>
            </div>
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>

    </body>
</html>