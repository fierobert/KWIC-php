<?php
	function process_file_upload(){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo '<div class="alert alert-warning" role="alert">There was a file with the same name. It was rewritten.</div>';
		    $uploadOk = 1;
		}
		// Allow certain file formats
		if($imageFileType != "txt" ) {
		    echo '<div class="alert alert-danger" role="alert">Sorry, only Text files are allowed, with extention .txt. </div>';
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo '<div class="alert alert-danger" role="alert">Sorry, your file was not uploaded. </div>';
		    return FALSE;
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo '<div class="alert alert-success" role="alert">The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.</div>';
		        return $target_file;
		    } else {
		        echo '<div class="alert alert-danger" role="alert">Sorry, there was an error uploading your file.</div>';
		        return FALSE;
		    }
		}
	}
?>
