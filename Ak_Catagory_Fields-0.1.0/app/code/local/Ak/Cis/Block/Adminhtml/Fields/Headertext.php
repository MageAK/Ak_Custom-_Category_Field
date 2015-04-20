<?php


class Ak_Cis_Block_Adminhtml_Grid_Headertext extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
  {
    $this->_controller = 'adminhtml_cis';
    $this->_blockGroup = 'cis';
    $this->_headerText = Mage::helper('cis')->__('Fields Manager');
    $this->_addButtonLabel = Mage::helper('cis')->__('List of custom Fields');
    parent::__construct();
  }

   
}
