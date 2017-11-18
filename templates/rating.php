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
			<?php
				if(file_exists("img/". $dogIds[0] .".jpg")) {
					?>
					<img class="img-responsive" src="img/<?= $dogIds[0]?>.jpg">
					<?php
				} else if(file_exists("img/". $dogIds[0] .".png")) {
					?>
					<img class="img-responsive" src="img/<?= $dogIds[0]?>.png">
					<?php
				} else if(file_exists("img/". $dogIds[0] .".jpeg")) {
					?>
					<img class="img-responsive" src="img/<?= $dogIds[0]?>.jpeg">
					<?php
				} else if(file_exists("img/". $dogIds[0] .".gif")) {
					?>
					<img class="img-responsive" src="img/<?= $dogIds[0]?>.gif">
					<?php
				} else {
					echo "Es wurde kein Bild gefunden :(";
				}
			?>
		</a>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<a class="thumbnail" href="?pref=<?= $dogIds[1]?>&disf=<?= $dogIds[0]?>">
			<img class="img-responsive" src="img/<?= $dogIds[1]?>.jpg">
		</a>
	</div>
</div>