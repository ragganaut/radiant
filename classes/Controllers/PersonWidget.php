<?php
namespace Radiant\Controllers;

use Radiant\Template as Template;

class PersonWidget extends \Radiant\Controller
{
    public static function getCard($options)
    {
        $template = new Template();
        $template->render('person_card', [
            'name' => $options['name']
        ]);
    }
}
