<?php
$dogIds = getRandomDogIds();

if(isset($_GET['pref'], $_GET['disf'])) {
	rateDogs($_GET['pref'], $_GET['disf']);
}
?>
<div class="row">
	<h2 class="text-center">Which dog is better?</h2>
</div>

<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<a class="thumbnail" href="?pref=<?= $dogIds[0]?>&disf=<?= $dogIds[1]?>">
			<img class="img-responsive" src="img/<?= $dogIds[0]?>.jpg">
		</a>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<a class="thumbnail" href="?pref=<?= $dogIds[1]?>&disf=<?= $dogIds[0]?>">
			<img class="img-responsive" src="img/<?= $dogIds[1]?>.jpg">
		</a>
	</div>
</div>