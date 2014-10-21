    <?php foreach ($texts as $text): ?>
    <tr>
    	<!-- REF bgcolor http://www.w3schools.com/tags/att_td_bgcolor.asp -->
        <td bgcolor="yellow" width="5%">
        <!-- <td bgcolor="yellow"> -->
        	<?php echo $text['Text']['id']; ?>
        </td>
        
        <td colspan="5" width="80%">
        <!-- <td colspan="5" width="90%"> -->
        <!-- <td colspan="5" width="800"> -->
            <?php
            	
	            $tmp_text = $text['Text']['memo'];
	             
	             
	            
	            if (strpos($tmp_text, '/*') !== false) {
// 	            if (strpos($tmp_text, '/*') != false) {
	            	//         	if (substr($tmp_text, strlen())) {
	            	 
	            	echo $this->Html->link($text['Text']['title'],
						array(
								'controller' => 'texts',
								'action' => 'view',
								$text['Text']['id']),
// 						array('style' => 'color: grey')
						array('class' => 'text_td_grey_text')
					);
	            
	            } else {
	            	
// 					echo "no /* (memo = $tmp_text)";
// 					echo strpos($tmp_text, '/*');
	            	echo $this->Html->link($text['Text']['title'],
						array(
								'controller' => 'texts',
								'action' => 'view',
								$text['Text']['id']));
					            	 
	            }
	            
             
			?>
		</td>
        <td colspan="3" width="5%">
        <!-- <td colspan="3" width="210"> -->
        	word ids
        </td>
    </tr>
    
    <tr>
        <td rowspan="3" colspan="6">
        <!-- <td rowspan="3" colspan="6" width="50%"> -->
        		<?php
        				$size = 100;
//         				$size = 300;
        				
        				$line = "";
        				
        				//REF mb_strlen http://stackoverflow.com/questions/16821534/check-if-is-multibyte-string-in-php
        				//REF http://www.php.net/manual/en/function.mb-strlen.php
        				$str_len = mb_strlen($text['Text']['text']);
        				
        				if ($str_len > $size) {
//         				if (strlen($text['Text']['text']) > $size) {
        				
        					$line = mb_substr($text['Text']['text'], 0, $size)
        							."...";
//         					$line = substr($text['Text']['text'], 0, $size);
        				
        				} else {
        				
							$line = $text['Text']['text'];

        				}
        		
        				echo $line;
//         				echo $text['Text']['text'];
        		?>
        </td>
        
        <td colspan="3" width="210">
        <!-- <td colspan="3" width="50%"> -->
        <!-- <td colspan="3" style="width: 25%"> -->
            <?php
            		//REF link http://stackoverflow.com/questions/9401490/cakephp-2-x-html-helper-for-external-link-not-working
            		$link = "";
            		if ($text['Text']['url']) {
            		
// 						$url = $text['Text']['url'];

						$url = "";
						
						if (strlen($text['Text']['url']) > 20) {
						
							$url = substr($text['Text']['url'], 0, 20);
						
						} else {
						
							$url = $text['Text']['url'];

						}

//             			$link = $text['Text']['url'];
	            		echo $this->Html->link(
	            				$url,
// 	            				$text['Text']['url'],
	            				$text['Text']['url'],
								array('target' => '_blank')
								);
            		
            		} else {

						echo "No url data";
						
            		}
            ?>
	    </td>
            		
    </tr>
    <tr>
    	<td width="70">
    			<!-- lang id -->
    			<?php echo $text['Lang']['name']; ?>
    			<?php //echo $text['Text']['lang_id']; ?>
    	</td>
    	<td width="70">data</td>
        <td width="70"><?php echo $text['Text']['created_at']; ?></td>
        
    </tr>
    <tr>
    	<td width="70">data</td>
    	<td width="70">data</td>
    	<td width="70"><?php echo $text['Text']['updated_at']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($text); ?>
    
