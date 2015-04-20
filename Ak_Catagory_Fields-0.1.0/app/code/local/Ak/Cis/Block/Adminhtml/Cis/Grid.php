<?php

class Ak_Cis_Block_Adminhtml_Cis_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    { 
        parent::__construct();
        $this->setId('cis_grid');
        $this->setDefaultSort('cis_id');
        $this->setDefaultDir('DESC');
        $this->setUseAjax(true);	
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('cis/cis')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    { 
        $this->addColumn('cis_id', array(
            'header'    => Mage::helper('cis')->__('ID'),
            'align'     =>'right',
            'width'     => '50',
            'index'     => 'cis_id',
        ));

        $this->addColumn('attribute_code', array(
            'header'    => Mage::helper('cis')->__('Attribute Code'),
            'align'     =>'left',
            'index'     => 'attribute_code',
        ));
        
         $this->addColumn('group', array(
            'header'    => Mage::helper('cis')->__('Group'),
            'index'     => 'group',
        ));

        $this->addColumn('frontend_input', array(
            'header'    => Mage::helper('cis')->__('Input'),
            'align'     => 'left',
            'index'     => 'frontend_input',
        ));

       

        $this->addColumn('type', array(
            'header'    => Mage::helper('cis')->__('Type'),
            'index'     => 'type',
        ));

        $this->addColumn('label', array(
            'header'    => Mage::helper('cis')->__('Label'),
            'index'     => 'label',
        ));

        $this->addColumn('visible', array(
            'header'    => Mage::helper('cis')->__('Visible'),
            'align'     => 'left',
            'width'     => '70',
            'index'     => 'visible',
            'type'      => 'options',
            'options'   => array(
                1 => Mage::helper('cis')->__('Enabled'),
                0 => Mage::helper('cis')->__('Disabled')
            ),
        ));

        $this->addColumn('required', array(
            'header'    => Mage::helper('cis')->__('Required'),
            'align'     => 'left',
            'width'     => '80',
            'index'     => 'required',
            'type'      => 'options',
            'options'   => array(
                1 => Mage::helper('cis')->__('Enabled'),
                0 => Mage::helper('cis')->__('Disabled')
            ),
        ));

        $this->addColumn('user_defined', array(
            'header'    => Mage::helper('cis')->__('User Defined'),
            'align'     => 'left',
            'width'     => '90',
            'index'     => 'user_defined',
            'type'      => 'options',
            'options'   => array(
                1 => Mage::helper('cis')->__('Enabled'),
                0 => Mage::helper('cis')->__('Disabled')
            ),
        ));

         $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('cis')->__('Action'),
                'width'     => '60',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('cis')->__('Delete'),
                        'url'       => array('base'=> '*/*/delete'),
                        'field'     => 'cis_id'
                    ),
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));

     //   $this->addExportType('*/*/exportCsv', Mage::helper('cis')->__('CSV'));
        return parent::_prepareColumns();
    }

      
    
    
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('cis_id' => $row->getId()));
    }
}
