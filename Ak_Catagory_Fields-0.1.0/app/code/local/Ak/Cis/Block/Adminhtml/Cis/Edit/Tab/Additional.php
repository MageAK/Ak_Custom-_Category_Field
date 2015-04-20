<?php

class Ak_Cis_Block_Adminhtml_Cis_Edit_Tab_Additional extends Mage_Adminhtml_Block_Widget_Form
{

   public function __construct() {
        parent::__construct();
        $this->assign('aftermessages', Mage::registry('afterMessage'));
        $this->setTemplate('ak/cis.phtml');
    }

}
