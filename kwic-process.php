<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KWIC -> Keyword In Context online generator</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <!-- CONTENT __________________________________________________________________________________________ -->
	  
		<div class="container">
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

								echo '<div class="row">
										<h3>Result</h3>
										<ul class="list-group">';
								echo_array_of_sentences_with_html_tag($ordered_shifted_array_of_sentences, 'li');
								echo '</ul></div>';
							} else {
								echo '<div class="alert alert-danger" role="alert">
										<h2>Error getting ordered array of sentences!</h2>
									  </div>';
							}
						} else {
							echo '<div class="alert alert-danger" role="alert">
									<h2>Error getting shifted array of sentences!</h2>
								  </div>';
						}
					} else {
						echo '<div class="alert alert-danger" role="alert">
								<h2>Error getting text data from file!</h2>
							  </div>'; 
					}
					

				} else {
					echo '<div class="alert alert-danger" role="alert">
							<h2>Error uploading file!</h2>
						  </div>';
				}	
			?>
			<p><a href="index.html">Main Page</a></p>
		</div>

  <!-- END CONTENT __________________________________________________________________________________________ -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>

