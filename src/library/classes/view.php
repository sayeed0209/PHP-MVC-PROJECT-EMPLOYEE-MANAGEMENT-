<?php
class View
{
    protected $entity;
    function __construct($entity)
    {
        $this->entity = $entity;
    }
    public function render($view)
    {
        require 'src/views/' . $this->entity .'/'. $view . '.php';
        // echo 'render data view';
    }
}
