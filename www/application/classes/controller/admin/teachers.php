<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Teachers extends Controller_Admin_App {
        
    public function before() 
    {
        parent::before();
        $this->objects['teachers']->set_users_breadcrumb('teachers');
    }
    
    public function action_slider() 
    {
        $this->objects['teachers']->action_slider();
    }
    
    public function action_tab() 
    {
        $this->objects['teachers']->action_tab();
    }
    
    public function action_create() 
    {
        $this->objects['teachers']->action_create();
    }
    
    public function action_edit() 
    {
        $this->objects['teachers']->action_edit();
    }
    
    public function action_delete() 
    {
        $this->objects['teachers']->action_delete();
    }
    
    public function action_view() 
    {
        $this->objects['teachers']->action_view();
    }
    
    public function action_associatesubject()
    {
        $this->objects['teachers']->action_associatesubject();
    }
}