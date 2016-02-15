<?php
	function load_text_data($target_file){
		if (!empty($target_file)){
	        $text_data = file_get_contents($target_file);
	        return explode("\n", $text_data);
	    } else {
	    	return FALSE;
	    }
	}

	function sort_alphabetically_array_of_sentences($array_of_sentences){
		if (!empty($array_of_sentences)) {
			natcasesort($array_of_sentences); //Sort an array using a case insensitive "natural order" algorithm
			return array_values($array_of_sentences); // returns all the values from the array and indexes the array numerically.
        } else {
        	return FALSE;
        }
	}

	function echo_array_of_sentences_with_html_tag($array_of_sentences, $tag){
		if (!empty($array_of_sentences)){
			foreach ($array_of_sentences as $key => $sentence)
			{
				echo '<'.$tag.'>'.$sentence.'</'.$tag.'>';
			}
		}
	}
?>