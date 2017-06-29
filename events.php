<?php
use \Radiant\App as App;

App::bind('templateIncluded', 'onTemplateIncluded');

function onTemplateIncluded($template)
{
    if ($template == 'header') return onHeaderIncluded();
}

function onHeaderIncluded()
{
    return [
        'title' => 'РадиантШоп',
    ];
}
