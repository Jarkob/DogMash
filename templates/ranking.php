<h2>Top 10</h2>
<?php

$dogs = getDogs();
//$dogs = sortDogs($dogs);

echo "<ol>";
foreach($dogs as $dog) {
?>
	<li>
		<?= $dog['id']?>, score: <?= $dog['score']?>
		<img class="img-responsive" src="img/<?= $dog['id']?>.jpg">
	</li>
<?php
}
echo "</ol>";
?>