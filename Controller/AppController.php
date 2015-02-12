<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	

	public function beforeFilter() {

        if($this->request->is('ajax')){
            $this->layout='reload';
        }
    }

    public function updateField($id){
        $model = $this->modelClass;
        
        if (!$this->$model->exists($id))
            return false;
    	
        $this->layout = "ajax";
        $this->render("/Common/ajax");


    	if($this->request->is("ajax")){
            echo $this->$model->updateFieldAjax($id, $this->request->data);
            return true;
        }
        // $this->redirect($this->referer());
    }
}
