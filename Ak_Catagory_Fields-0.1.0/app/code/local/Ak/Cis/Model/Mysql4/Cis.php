<?php

class Ak_Cis_Model_Mysql4_Cis extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct(){
        $this->_init('cis/cis', 'cis_id');
    }
    
}
