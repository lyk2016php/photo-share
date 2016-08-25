<? if(Alert::haveAny()): ?>
	<div class="alert alert-info" role="alert">
		<ul>
		<? foreach(Alert::getAlerts() as $alert): ?>
			<li><?=$alert?></li>
		<? endforeach; ?>
		</ul>
	</div>
<? endif; ?>