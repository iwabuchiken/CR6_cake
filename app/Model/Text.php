<?php

class Text extends AppModel {
	//REF http://www.packtpub.com/article/working-with-simple-associations-using-cakephp
	var $name = 'Text';
	
	var $belongsTo = 'Lang';
// 	var $belongsTo = array(
// 			'Lang' => array(
// 					'className' => 'Lang',
// 					'foreignKey' => 'r_id'
// 					)
// 			);
	
	//REF http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
// // 	public $hasOne = 'Lang';
// 	public $hasOne = array(
			
// 			'Lang' => array(
					
// 					'className' => 'Lang',
// 					'foreignKey' => 'id'
// 			)
// 	);
	
}
