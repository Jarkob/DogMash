<?php
// Bildbehandlung
if(isset($_FILES['picture']['name'])) {
	if($_FILES['picture']['name'] != "") {
		$upload_folder = 'img/'; //Das Upload-Verzeichnis
		if(!file_exists($upload_folder)) {
			mkdir($upload_folder);
		}

		$filename = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME); // Diese Zeile ist glaube ich unnötig
		$extension = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
		 
		 
		//Überprüfung der Dateiendung
		$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
		if(!in_array($extension, $allowed_extensions)) {
		 	die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
		}
		 
		//Überprüfung der Dateigröße
		$max_size = 1080*1920; //500 KB
		if($_FILES['picture']['size'] > $max_size) {
		 	die("Bitte keine Riesenbilder hochladen...");
		}
		 
		//Überprüfung dass das Bild keine Fehler enthält
		if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
		 	$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		 	$detected_type = exif_imagetype($_FILES['picture']['tmp_name']);
		 	if(!in_array($detected_type, $allowed_types)) {
		 		die("Nur der Upload von Bilddateien ist gestattet");
		 	}
		}


		// Der dog muss der db hinzugefügt werden
		$sql = "INSERT INTO dogs (id) VALUES (NULL)";
		sql::exe($sql);
		$lastInsertId = sql::lastInsertId();

		 

		// Wenn der User vorher ein Profilbild hatte, muss dieses gelöscht werden.
		foreach($allowed_extensions as $allowed_extension) {
			if(file_exists($upload_folder . $lastInsertId .".". $allowed_extension)) {
				unlink($upload_folder . $lastInsertId .".". $allowed_extension);
			}
		}


		//Pfad zum Upload
		$new_path = $upload_folder.$lastInsertId.'.'.$extension;
		 
		//Alles okay, verschiebe Datei an neuen Pfad
		move_uploaded_file($_FILES['picture']['tmp_name'], $new_path);
	}
}
?>

<form action="#" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="newDogImage">Bild hochladen</label>
		<input id="newDogImage" type="file" name="picture">
	</div>
	<button type="submit" class="btn btn-default">Hinzufügen</button>
</form>