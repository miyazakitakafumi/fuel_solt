<?php

class Controller_Base extends Controller_Template
{
    public function before()
    {
        parent::before();
        $this->template->header = View::forge('common/header');
    }

    public function after($response)
    {
        
        $response = parent::after($response);
        return $response; 
    }
}