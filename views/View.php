<?php

class View
{
    public function render($templatePage, $contentPage, $data = null)
    {
        require_once './views/templates/' . $templatePage . '.php';
    }

    public function redirect($page)
    {
        header("Location: /{$page}");
    }
}