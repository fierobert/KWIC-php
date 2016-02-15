<?php
	require("kwic-process-file-upload.php");
	require("kwic-process-sentences.php");
	require("kwic-process-shift-sentences.php");

	$target_file = process_file_upload();
	if ( $target_file != FALSE ){
		$text_data = load_text_data($target_file);
		
		if ($text_data != FALSE ){
			$shifted_array_of_sentences = shift_sentences_in_array($text_data);

			if ($shifted_array_of_sentences != FALSE ){

				$ordered_shifted_array_of_sentences = sort_alphabetically_array_of_sentences($shifted_array_of_sentences);
				
				if ($ordered_shifted_array_of_sentences != FALSE ){

					echo '<ul>';
					echo_array_of_sentences_with_html_tag($ordered_shifted_array_of_sentences, 'li');
					echo '</ul>';
				} else {
					echo '<h2>Error getting ordered array of sentences!</h2>';
				}
			} else {
				echo '<h2>Error getting shifted array of sentences!</h2>';
			}
		} else {
			echo '<h2>Error getting text data from file!</h2>'; 
		}
		

	} else {
		echo '<h2>Error uploading file!</h2>';
	}

	
?>