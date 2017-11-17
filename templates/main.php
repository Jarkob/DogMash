<main>
<?php

if(isset($_GET['site'])) {
	if($_GET['site'] == "rating") {
		require_once("rating.php");
	} else if($_GET['site'] == "ranking") {
		require_once("ranking.php");
	} else if($_GET['site'] == "add") {
		require_once("addDog.php");
	} else {
		require_once("error.php");
	}
} else {
	require_once("rating.php");
}
?>
</main>