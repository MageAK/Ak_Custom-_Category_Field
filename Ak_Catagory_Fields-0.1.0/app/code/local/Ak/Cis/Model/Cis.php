<?php

class Ak_Cis_Model_Cis extends Mage_Core_Model_Abstract
{
    public function _construct(){
        parent::_construct();
        $this->_init('cis/cis');
    }

}
