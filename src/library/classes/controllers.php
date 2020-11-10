<?php

class Controller {
    function __construct($entity)
    {
        $this->view = new View($entity);
         SessionHelper::sessionTime();
    }

}


?>