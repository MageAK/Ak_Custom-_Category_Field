<?php


class Ak_Cis_Block_Adminhtml_Cis_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    { 
        parent::__construct();
        $this->setId('New_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('cis')->__('Extension Options'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('info', array(
            'label'     => Mage::helper('cis')->__('Add Fields'),
            'content'   => $this->getLayout()->createBlock('cis/adminhtml_cis_edit_tab_info')->initForm()->toHtml(),
        ));
   
        $this->addTab('additional', array( 
            'label'     => Mage::helper('cis')->__('Instructions'),
            'content'   => $this->getLayout()->createBlock('cis/adminhtml_cis_edit_tab_Additional')->toHtml(),

          //$this->getLayout()->createBlock('cis/adminhtml_cis_grid')
          //==  ->toHtml(),
            //'class' => 'ajax',
        ));  

        return parent::_beforeToHtml();
    }
}
