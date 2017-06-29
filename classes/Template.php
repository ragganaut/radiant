<?php
namespace Radiant;
use \Radiant\Event as Event;

class Template
{
    private $variables = [];

    public function render($template, $variables)
    {
        foreach ($variables as $name => $value) {
            $this->variables[$name] = $value;
            $$name = $value;
        }

        include($_SERVER['DOCUMENT_ROOT'].'/templates/'.$template.'.php');
    }

    public function include($template)
    {
        $variables = Event::templateIncluded($template);

        if (is_array($variables)) {
            foreach ($variables as $name => $value) {
                $$name = $value;
            }
        }

        foreach ($this->variables as $name => $value) {
            $$name = $value;
        }

        include($_SERVER['DOCUMENT_ROOT'].'/templates/'.$template.'.php');
    }

    public function includeComponent(callable $component, array $options)
    {
        call_user_func($component, $options);
    }
}
