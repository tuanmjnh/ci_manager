<div class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <div class="sidebar-language">
            <?php
//                if ($langdata!=NULL) {
//                    echo '<select id="language" class="form-control" name="lid">';
//                    foreach ($langdata as $row) {
//                        if ($row->LIID == $this->session->userdata['lang']) {
//                            echo '<option selected="" value="' . $row->LIID . '">' . $row->LVTitle . '</option>';
//                        } else {
//                            echo '<option value="' . $row->LIID . '">' . $row->LVTitle . '</option>';
//                        }
//                    }
//                    echo '</select>';
//                }
            if ($langdata != NULL) {
                echo '<div class="dropdown">';
                echo '<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">';
                echo '<span><img src="' . TM_BASE_URL . $this->mdl_language->langimg() . '"></span>' . $this->mdl_language->langname();
                echo '<span class="caret"></span></a>';
                echo '<ul class="dropdown-menu dropdown-menu-none">';
                foreach ($langdata as $row) {
                    echo '<li><a href="#" class="lang-select" value="' . $row->LVLangCode . '">' .
                    '<span><img src="' . TM_BASE_URL . $row->LVImages . '"></span>' . $row->LVTitle . '</a></li>';
                }
                echo '</ul></div>';
            }
            ?>
            <script type="text/javascript">
                $(function () {
                    $('.lang-select').on('click', function (e) {
                        e.preventDefault();
                        var data = {
                            csrf_test_name: $.cookie('csrf_cookie_name'),
                            lang: $(this).attr('value')}
                        $.get('<?= $this->tmpluss->getUrl() . 'language/setLanguage' ?>', data, function () {
                            window.location = window.location.href;
                        });
                    });
                });
            </script>
        </div>
        <ul class="nav" id="main-menu">
            <!-- <li class="sidebar-search">
                               <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="<?LKEY::GET('search')?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
            </li>-->
            <?php
            $roles = TMLib::Split(trim(Logged::roles(), ','));
            $modules [] = 'main';
            $m = $this->mdl_module->get_parent($roles);
            if ($m != NULL)
                foreach ($m as $k => $v) {
                    $s = $this->mdl_module->get_sub_parent($roles, $v->MVID);
                    if (!in_array($v->MVUrl, $modules))
                        $modules[] = $v->MVUrl;
                    echo '<li>';
                    echo '<a href="' . (isset($v->MVUrl) ? $this->tmpluss->getUrl() . $v->MVUrl : '#') . '">';
                    echo '<i class="' . (isset($v->MVCIcon) ? $v->MVCIcon : '') . '"></i> ';
                    echo (isset($v->MVTitle) ? LKEY::GET('menu' . $v->MVTitle) : '') . '</a>';
                    if ($s != NULL) {
                        echo '<ul class="nav sub">';
                        foreach ($s as $sk => $sv) {
                            if (!in_array($sv->MVUrl, $modules))
                                $modules[] = $sv->MVUrl;
                            echo '<li><a href="' . (isset($sv->MVUrl) ? $this->tmpluss->getUrl() . $sv->MVUrl : '#') . '">';
                            echo '<i class="' . (isset($sv->MVCIcon) ? $sv->MVCIcon : '') . '"></i> ';
                            echo (isset($sv->MVTitle) ? LKEY::GET($sv->MVTitle . 'PTitle') : '') . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    echo '</li>';
                }
            if (!in_array($this->router->fetch_class(), $modules))
                show_error('Error 12', 12, $heading = '12');
            ?>
            <script>
                $(function () {
                    $('#main-menu li').each(function () {
                        if ($(this).has('ul').length > 0)
                            $(this).children('a').append('<span class="fa arrow"></span>');
                        if ($(this).children('a').attr('href') == CurrentUrl) {
                            $(this).addClass('active focus');
                            if ($(this).parent().hasClass('sub'))
                                $(this).parent().parent().addClass('active');
                        }
                    })
                })
            </script>
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>