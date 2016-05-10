<?php

class Polcode_Helloworld_IndexController 
    extends Mage_Core_Controller_Front_Action {
    
    public function indexAction() 
    {
        var_dump('Test');
    }
    
    public function blockAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    
}
