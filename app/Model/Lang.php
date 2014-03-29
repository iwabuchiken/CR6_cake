<?php

class Lang extends AppModel {

	//REF http://www.packtpub.com/article/working-with-simple-associations-using-cakephp
	var $name = 'Lang';
	
// 	var $hasMany = 'Text';
	var $hasMany = array(
			
			'Text' => array(
					
					'className' => 'Text'
			),
			
			'Word' => array(
					
					'className' => 'Word'
			)
			
			);
	
// 	var $hasMany = 'Word';
	
	//REF http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
// 	public $hasMany = 'Text';
	
// 	public function get_Msg() {
		
// 		return "Message";
		
// 	}
}
