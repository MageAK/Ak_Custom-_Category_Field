<?php

class Ak_Cis_Block_Adminhtml_Cis_Edit_Tab_Info extends Mage_Adminhtml_Block_Widget_Form
{
    public function initForm()
    {
        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('cis_form', array('legend'=>Mage::helper('cis')->__('Info Main')));

        $fieldset->addField('status', 'select', array(
        'label'     => Mage::helper('cis')->__('Status'),
        'name'      => 'status',
        'values'    => array(
          array(
              'value'     => 1,
              'label'     => Mage::helper('cis')->__('Enabled'),
          ),

          array(
              'value'     => 2,
              'label'     => Mage::helper('cis')->__('Disabled'),
          ),
        ),
        ));
       
        $fieldset->addField('attribute_code', 'text', array(
          'label'     => Mage::helper('cis')->__('Attribute Code'),
          'class'     => 'required-entry',
          'required'  =>  true,
          'name'      => 'attribute_code',
        ));

        $fieldset->addField('group', 'text', array(
          'label'     => Mage::helper('cis')->__('Group'),
          'class'     => 'required-entry',
          'required'  => true,
          'note'  => Mage::helper('cis')->__('For default category tab use "General Information,Display Settings,Custom Design"'),
          'name'      => 'group',
        ));
 //  $inputTypes = Mage::getModel('eav/adminhtml_system_config_source_inputtype')->toOptionArray();
 
      $fieldset->addField('frontend_input', 'select', array( 
      'label' => Mage::helper('cis')->__('Input Type'), 
      'class' => 'required-entry',
      'required' => true, 
      'name' => 'frontend_input', 
      'value' => 'text', 
      'values' => array(''=>'Please Select..','text' => 'TextField','textarea' => 'TextArea', 'date' => 'Datetime','image' => 'Image'), 
       ));
       

        
     /* $fieldset->addField('frontend_input', 'select', array(
            'name' => 'frontend_input',
            'label' => Mage::helper('eav')->__('Input Type'),
            'title' => Mage::helper('eav')->__('Input Type'),
            'value' => 'text',
            'values'=> $inputTypes
        ));*/
        
       $fieldset->addField('type', 'select', array( 
      'label' => Mage::helper('cis')->__('Text Type'), 
      'class' => 'required-entry',
      'required' => true, 
      'name' => 'type', 
      'value' => 'text', 
      'values' => array(''=>'Please Select..','varchar' => 'varchar','int' => 'Int', 'datetime' => 'datetime','text' => 'text'), 
      'after_element_html' => '<small>Please Choose "type" according to field input ex: </br>TextArea => "varchar",Textfield => "varchar",DateTime => "datetime", Image => "varchar".</small>', 'tabindex' => 1 ));
       
      
        $fieldset->addField('label', 'text', array(
          'label'     => Mage::helper('cis')->__('Label'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'label',
        ));
       
      $fieldset2 = $form->addFieldset('cis_form2', array('legend'=>Mage::helper('cis')->__('Info Last')));

      $fieldset2->addField('visible', 'select', array(
        'label'     => Mage::helper('cis')->__('Visible'),
        'name'      => 'visible',
        'class'     => 'required-entry',
        'values'    => array(
          array(
              'value'     => 1,
              'label'     => Mage::helper('cis')->__('Yes'),
          ),

          array(
              'value'     => 0,
              'label'     => Mage::helper('cis')->__('No'),
          ),
        ),
        ));

        $fieldset2->addField('required', 'select', array(
        'label'     => Mage::helper('cis')->__('Required'),
        'name'      => 'required',
        'class'     => 'required-entry',
        'values'    => array(
          array(
              'value'     => 1,
              'label'     => Mage::helper('cis')->__('Yes'),
          ),

          array(
              'value'     => 0,
              'label'     => Mage::helper('cis')->__('No'),
          ),
        ),
        ));

        $fieldset2->addField('user_defined', 'select', array(
        'label'     => Mage::helper('cis')->__('User Defined'),
        'name'      => 'user defined',
        'class'     => 'required-entry',
        'values'    => array(
          array(
              'value'     => 1,
              'label'     => Mage::helper('cis')->__('Yes'),
          ),

          array(
              'value'     => 0,
              'label'     => Mage::helper('cis')->__('No'),
          ),
        ),


      
        ));       
         
           if (Mage::getSingleton('adminhtml/session')->getCisData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getCisData());
            Mage::getSingleton('adminhtml/session')->setCisData(null);
        } elseif ( Mage::registry('cis_data') ) {
            $data = Mage::registry('cis_data');
                  $form->setValues($data->getData());
        }

 
        $this->setForm($form);
        return $this;
    }
}
