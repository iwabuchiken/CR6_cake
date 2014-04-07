<?php

class Text extends AppModel {
	
	//REF http://www.packtpub.com/article/working-with-simple-associations-using-cakephp
	var $name = 'Text';
	
	var $belongsTo = 'Lang';
	
	
}
