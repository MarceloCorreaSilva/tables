<?php

App::uses('Model', 'Model');

class AppModel extends Model {

	public function updateFieldAjax($id, $data)
	{
		$column = $data['column'];
		$this->id = $id;

		$this->saveField( $column, $data['value'], false );
		$data = $this->read(array($column), $id);
		return $data[$this->name][ $column ];
	}
}
