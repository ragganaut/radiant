<?php
namespace Radiant;

class Event
{
    public static function templateIncluded($template)
    {
        $events = App::getEvents();
        if(is_callable($events['templateIncluded'])) return call_user_func($events['templateIncluded'], $template);
    }
}
