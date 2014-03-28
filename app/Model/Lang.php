<?php

class Lang extends AppModel {

	//REF http://www.packtpub.com/article/working-with-simple-associations-using-cakephp
	var $name = 'Lang';
	
	var $hasMany = 'Text';
	
	//REF http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
// 	public $hasMany = 'Text';
	
// 	public function get_Msg() {
		
// 		return "Message";
		
// 	}
}
