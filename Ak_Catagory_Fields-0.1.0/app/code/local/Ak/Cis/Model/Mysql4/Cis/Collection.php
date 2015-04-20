<?php


class Ak_Cis_Model_Mysql4_Cis_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        //parent::_construct();
        $this->_init('cis/cis');
    }
 
}
