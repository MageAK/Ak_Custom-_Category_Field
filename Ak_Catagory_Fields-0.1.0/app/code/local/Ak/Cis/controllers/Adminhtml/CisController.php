<?php 

class Ak_Cis_Adminhtml_CisController extends Mage_Adminhtml_Controller_Action
{

       
       protected function _initAction()
    {  
        // load layout, set active menu
       $this->loadLayout()
            ->_setActiveMenu('cis/CategoryAttribute');
        return $this;
    }

    public function indexAction() {
          $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('cis/adminhtml_cis'))
            ->renderLayout();

    }
  
    public function gridAction() {
         
        $this->_initAction()
            
            ->_addContent($this->getLayout()->createBlock('cis/adminhtml_fields'))
            //->_addContent($this->getLayout()->createBlock('cis/adminhtml_grid')) 
      
            ->renderLayout();
    }
   
     public function newAction() {
       $this->_forward('edit');
    }
 
   

     public function editAction() {
        $id = $this->getRequest()->getParam('cis_id');
        $model = Mage::getModel('cis/cis')->load($id);
        $model->load($id);
        $model->delete();
        if ($id) {
            $model->load($id);
            if (! $model->getId()) {
                Mage::getSingleton('adminhtml/session')
                    ->addError(Mage::helper('cis')->__('Content article does not exist'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);

        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('cis_data', $model);

        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('cis/adminhtml_cis_edit'))
            ->_addLeft($this->getLayout()->createBlock('cis/adminhtml_cis_edit_tabs'))
            ->renderLayout();
    }
       public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			
					 	
			$model = Mage::getModel('cis/cis');		
			$model->setData($data)->setId($this->getRequest()->getParam('cis_id'));
			
			try { 
                    $new = Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL;
					$installer = new Mage_Sales_Model_Mysql4_Setup;
                    if($data['required'] == 1){ $is_required = true;}else{$is_required = false;}
                    if($data['user_defined'] == 1){ $user_defined = true;}else{$user_defined = false;}
                   

					if($data['frontend_input'] != "image"){
                    $attribute  = array(
 							  	   "type" =>  $data['type'],
							       "label"=>  $data['label'],
							       "input" => $data['frontend_input'],
                    
 								   "global" => $new,
 								   "visible" => true,
 								   "required" => $is_required,
							       "user_defined" => $user_defined,
 							       "default" => "",
  								   "group" => $data['group']
									);
                 }else {
                     $attribute  = array(
                                   "type" =>  $data['type'],
                                   "label"=>  $data['label'],
                                   "input" => $data['frontend_input'],
                                   "backend" => "catalog/category_attribute_backend_image",
                                   "global" => $new,
                                   "visible" => true,
                                   "required" => $is_required,
                                   "user_defined" => $user_defined,
                                   "default" => "",
                                   "group" => $data['group']
                                    );}
					$installer->addAttribute("catalog_category", $data['attribute_code'], $attribute);
					$installer->endSetup();
                                               
                    $model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('cis')->__('successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('cis_id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/grid');
				return;
            } catch (Exception $e) {

                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('cis_id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('cis')->__('Error'));
        $this->_redirect('*/*/');
	}

         public function deleteAction() {
        if ($id = $this->getRequest()->getParam('cis_id')) {
            try {
                 
                $model = Mage::getModel('cis/cis');
                $newid = $model->load($id);
                
                $model_new = Mage::getModel('eav/entity_attribute');
                $model_collection = $model_new->getCollection();

		foreach($model_collection as $value){
                   
                 if($value->getAttributeCode() == $newid->getAttributeCode() ){
                     $attributeid = $value->getAttributeId();
                     
                 }}
	      
                  $model_new->load($attributeid);
                  $model_new->delete();

                $model->delete();
                $this->_redirect('*/*/edit', array('cis_id' => $id));
                Mage::getSingleton('adminhtml/session')
                    ->addSuccess(Mage::helper('cis')->__('Field successfully deleted'));
                
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('cis_id' => $id));
            }
        }
        $this->_redirect('*/*/grid');
    }
          
      
    

}
