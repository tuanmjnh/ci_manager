<?php

class TMPage {

    protected $page = 1;
    protected $limit = 10;
    protected $total_count = 10;

    function __construct($page, $limit, $total_count) {
        $this->set_page($page);
        $this->set_limit($limit);
        $this->set_total_count($total_count);
    }

    public function page_data() {
        return array(
            'Page' => $this->get_page(),
            'TotalPage' => $this->get_total_page(),
            'Offset' => $this->get_offset(),
            'TotalCount' => $this->get_total_count(),
            'Limit' => $this->get_limit());
    }

//    function __destruct() {
//        return array('Page' => $this->get_page(),
//            'TotalPage' => $this->get_total_page(),
//            'Offset' => $this->get_offset(),
//            'TotalCount' => $this->get_total_count());
//    }

    public function get_total_page() {
        return ceil($this->get_total_count() / $this->get_limit());
    }

    public function set_page($var = 1) {
        try {
            if (intval($var) > 0)
                $this->page = (int) $var;
        } catch (Exception $exc) {}
    }

    public function get_page() {
        $total_page = $this->get_total_page();
        if ($this->page > 1 && $this->page > $total_page)
            return $total_page;
        return $this->page;
    }

    public function set_limit($var = 10) {
        try {
            if (intval($var) > 0)
                $this->limit = (int) $var;
        } catch (Exception $exc) {}
    }

    public function get_limit() {
        return $this->limit;
    }

    public function set_total_count($var) {
        try {
            if (intval($var) > 0)
                $this->total_count = (int) $var;
        } catch (Exception $exc) {}
    }

    public function get_total_count() {
        return $this->total_count;
    }

    public function get_offset() {
        return ($this->get_page() - 1) * $this->get_limit();
    }

}
