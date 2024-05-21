<?php
class PageController {
    public string $page_name;

    public function __construct($page_name = 'home') {
        $this->page_name = $page_name;
    }

    public function render() {
        $page = $this;
        include 'views/template.php';
    }
}


if (!isset($page_name)) {
    $page_name = 'home';
}

$page = new PageController($page_name);
$page->render();

