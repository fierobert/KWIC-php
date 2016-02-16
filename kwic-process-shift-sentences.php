<?php 
	function shift_sentences_in_array($array_of_sentences){
		$counter = 0;
        foreach ($array_of_sentences as $key => $sentence) {
			$words_in_sentence = str_word_count($sentence, 0);
            $array_of_words_in_sentence = explode(" ", $sentence);
            for ($i = 0; $i < $words_in_sentence; $i++){
            	$initial_word = array_slice($array_of_words_in_sentence, 0, 1);
                $shifted_array_of_words = array_shift($array_of_words_in_sentence); //Takes out first word
                array_push($array_of_words_in_sentence, $shifted_array_of_words); 
                $shifted_sentence = implode(" ", $array_of_words_in_sentence);
				$shifted_array_of_sentences[$counter] = $shifted_sentence;
				$counter++;
			}
        }
    	if (isset($shifted_array_of_sentences)){
    		return $shifted_array_of_sentences;
    	} else {
    		return FALSE;
    	}		
	}
?>