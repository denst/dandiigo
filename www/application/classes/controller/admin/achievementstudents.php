<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_AchievementStudents extends Controller_Admin_App {
        
    public function before() 
    {
        parent::before();
        $this->objects['achievementstudents']->set_records_breadcrumb('achievementstudents', 'students');
    }
    
    
    public function action_list() 
    {
        $this->objects['achievementstudents']->action_list();
    }
    
    public function action_create() 
    {
        $this->objects['achievementstudents']->action_create();
    }
    
    public function action_edit() 
    {
        $this->objects['achievementstudents']->action_edit();
    }
    
    public function action_delete() 
    {
        $this->objects['achievementstudents']->action_delete();
    }
}
  