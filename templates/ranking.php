<h2>Top 10</h2>
<?php

$dogs = getDogs();
//$dogs = sortDogs($dogs);

echo "<ol>";
foreach($dogs as $dog) {
?>
	<li>
		<div class="thumbnail">
			<img class="img-responsive" src="img/<?= $dog['id']?>.jpg">
			<div class="caption">
				<?= $dog['id']?>, score: <?= $dog['score']?>
			</div>
		</div>
	</li>
<?php
}
echo "</ol>";
?>