<?php


class Ak_Cis_Block_Adminhtml_Cis_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    { 
        $this->_objectId = 'cis_id';
        $this->_blockGroup = 'cis';
        $this->_controller = 'adminhtml_cis';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('cis')->__('Save'));
        $this->_updateButton('delete', 'label', Mage::helper('cis')->__('Delete'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }

        
        ";
    }

    public function getHeaderText()
    {
        if (Mage::registry('cis_data') && Mage::registry('cis_data')->getId()) {
            return Mage::helper('cis')->__("Edit Fields",
                $this->htmlEscape(Mage::registry('cis_data')->getTitle()));
        } else {
            return Mage::helper('cis')->__('Add New Fields');
        }
    }
}
