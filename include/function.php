<?php

class PAGINGS
{
    public $total;
    private $total_pages;
    private $page;
    private $start;
    private $end;
    public $get;
    public $count_get;

    public function __construct($size, $query)
    {
        $this->total = mysql_result(mysql_query(preg_replace('~SELECT (.*?) FROM~isU', 'SELECT COUNT(*) FROM', $query) . ' ;'), 0);
        $this->total_pages = ceil($this->total / $size);
        $this->page = isset($_POST['page']) ? $_POST['page'] : $_GET['page'];
        $this->page = !empty($this->page) && ctype_digit($this->page) && $this->page >= 1 && $this->page <= $this->total_pages ? $this->page : 1;
        $this->start = ($this->page * $size) - $size;
        $this->end = $this->start + $size < $this->total ? $this->start + $size : $this->total;
        $this->get = mysql_query($query . ' LIMIT ' . $this->start . ', ' . trim($size) . ' ;');
        $this->count_get = @ mysql_num_rows($this->get);
    }

    public function Links($link)
    {
        $link_list = '';
        $start = $this->page - 3;
        $end = $this->page + 3;
        for ($i = $start; $i <= $end; $i++) {
            $link_list .= ($i <= $this->total_pages && $i >= 1 ? ($this->page != $i ? '<span class="navId text-center"><a href="' . trim($link) . 'page=' . trim($i) . '&amp;' . SID . '">' . trim($i) . '</a></span> ' : ' <span class="active">' . trim($i) . '</span> ') : '');
        }
        return '<center class="pagination w-50 m-auto"><div class="w-25"></div>' . ($this->page > 1 ? '<span class="navId text-center"><a href="' . trim($link) . 'page=' . ($this->page - 1) . '&amp;' . SID . '">«</a></span>' : '') . ' ' . ($start > 1 ? '<span class="navId"><a href="' . trim($link) . 'page=1&amp;' . SID . '">1</a></span> ... ' : '') . $link_list . ($end < $this->total_pages ? ' ... <span class="navId"><a href="' . trim($link) . 'page=' . $this->total_pages . '&amp;' . SID . '">' . $this->total_pages . '</a></span>' : '') . ' ' . ($this->page < $this->total_pages ? '<span class="navId"><a href="' . trim($link) . 'page=' . ($this->page + 1) . '&amp;' . SID . '">»</a></span>' : '') . '</center>' . "";
    }
}

function page($k_page = 1)
{
    $page = 1;
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'end') $page = intval($k_page); elseif (is_numeric($_GET['page'])) $page = intval($_GET['page']);
    }
    if ($page < 1) $page = 1;
    if ($page > $k_page) $page = $k_page;
    return $page;
}

function k_page($k_post = 0, $k_p_str = 10)
{
    if ($k_post != 0) {
        $v_pages = ceil($k_post / $k_p_str);
        return $v_pages;
    } else return 1;
}