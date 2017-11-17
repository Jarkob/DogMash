<?php
//require_once("../src/sql.php");

function getAmountOfDogs()
{
	$sql = "SELECT COUNT(*) AS amount FROM dogs";
	$result = sql::exe($sql);
	return $result[0]['amount'];
}

function getRandomDogIds()
{
	$amountOfDogs = getAmountOfDogs();
	$dogIds = array();
	$dogIds[] = rand(1, $amountOfDogs);
	
	do {
		$newDogId = rand(1, $amountOfDogs);
	} while($dogIds[0] == $newDogId);
	$dogIds[] = $newDogId;

	return $dogIds;
}

function getDogScore($dogId)
{
	$sql = "SELECT * FROM dogs WHERE id = :id";
	$params = array(":id" => $dogId);
	$result = sql::exe($sql, $params);
	return $result[0]['score'];
}

function updateDogScore($dogId, $newScore)
{
	$sql = "UPDATE dogs SET score = :score WHERE id = :id";
	$params = array(":score" => $newScore, ":id" => $dogId);
	sql::exe($sql, $params);
}

function getDogs()
{
	$sql = "SELECT * FROM dogs ORDER BY score DESC LIMIT 10";
	return sql::exe($sql);
}

function rateDogs($preferredDogId, $disfavoredDogId)
{
	$k = 20;

	$Ra = getDogScore($preferredDogId);
	$Rb = getDogScore($disfavoredDogId);

	$Ea = 1 / (1 + 10^(($Rb - $Ra) / 400));

	$Eb = 1 / (1+ 10^(($Ra - $Rb) / 400));

	$RaUpdated = $Ra + $k * (1 - $Ea);
	$RbUpdated = $Rb + $k * (0 - $Eb);

	updateDogScore($preferredDogId, $RaUpdated);
	updateDogScore($disfavoredDogId, $RbUpdated);
}

function sortDogs($dogs)
{
	if(sizeof($dogs) == 1) {
		return $dogs;
	} else {
		$pivot = $dogs[0];
		$lowerHalf = array();
		$upperHalf = array();

		for($i = 0; $i < sizeof($dogs); $i++) {
			if($dogs[$i]['score'] < $pivot['score']) {
				$lowerHalf[] = $dogs[$i];
			} else {
				$upperHalf[] = $dogs[$i];
			}
		}

		if(sizeof($upperHalf) == 0) {
			$upperHalf[] = $pivot;
			$lowerHalf = array_slice($lowerHalf, 0, -1);
		} else if(sizeof($lowerHalf == 0)) {
			$lowerHalf[] = $upperHalf[0];
			$upperHalf = array_slice($upperHalf, 1);
		}

		$lowerHalf = sortDogs($lowerHalf);
		$upperHalf = sortDogs($upperHalf);
		return array_merge($lowerHalf, $upperHalf);
	}
}
?>