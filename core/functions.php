<?php 
	if(empty($errors) === false){
?>
<div id="logbox">
	<div class="error">
	<?php
		echo '<p>' . implode('</p><p>', $errors) . '</p>';	
		}
	?>
	</div>
</div>