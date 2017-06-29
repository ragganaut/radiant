<?php
namespace Radiant\Controllers;

use Radiant\Template as Template;

class PageController extends \Radiant\Controller
{
    public static function page($id)
    {
        $template = new Template();
        $template->render('page', [
            'h1' => "Страница {$id}"
        ]);
    }

    public static function contacts()
    {
        $template = new Template();
        $template->render('contacts', [
            'h1' => 'Контакты',
            'title' => 'Контакты'
        ]);
    }
}
