<?php 

class Ak_Cis_Block_Adminhtml_Cis extends  Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        
        $this->_controller = 'adminhtml_cis';
        $this->_blockGroup = 'cis';
          parent::__construct();
         
    }


    protected function _prepareLayout()    {
        return parent::_prepareLayout();
    }
}
