<?php
$messages = null;
if(isset($_SESSION['message'])){
	if( gettype($_SESSION['message'])=="array" ):
	$messages = $_SESSION['message'];
	unset($_SESSION['message']);
	endif;
}
?>
<? if(!is_null($messages)): ?>
	<div class="alert alert-info" role="alert">
		<? foreach($messages as $message): ?>
			<?=$message?><br>
		<? endforeach; ?>
	</div>
<? endif; ?>