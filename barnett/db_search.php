
<?php 

$dbhost = "vps-virginia-aurora-5-cluster.cluster-czvuylgsbq58.us-east-1.rds.amazonaws.com";
$dbname = "db_dom17799";
$dbuser = "db_dom17799";
$dbpass = "psXh544z47vwXiVWHwKAL4WppkTzpYM1BbBn4NGe";



global $wpdb;

$word  = preg_replace("/[^A-Za-z0-9]/", " ", $_GET['word']);

$html = '';
$html .= '<ol class="result hover_here"><a href="urlString">';
$html .= '<h3 id="searchResults" class ="search_result_style">nameString</h3>';
$html .= '</a></ol>';


// Check Length More Than One Character
if (strlen($word) >= 1 && $word !== ' ') {

		$wpdb = new mysqli();
		$wpdb->connect($dbhost, $dbuser, $dbpass, $dbname);
		$wpdb->set_charset("utf8");

		if ($wpdb->connect_errno) {
		    printf("Connect failed: %s\n", $wpdb->connect_error);
		    exit();
		}
		else{

				$sql = 'SELECT * FROM wp_posts WHERE post_title like "%'.$word.'%" AND post_type = "page" LIMIT 5';

				$result = $wpdb->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {

						// Format Output Strings And Hightlight Matches
						$display_name = preg_replace("/".$word."/i", "<b class='highlight'>".$word."</b>", $row['post_title']);
						$display_url = ''.$row['guid'];

						// Insert Name
						$output = str_replace('nameString', $display_name, $html);

						// Insert URL
						$output = str_replace('urlString', $display_url, $output);
						

						// Output

						echo $output;

					}
				}
				
				else {

					$output = str_replace('urlString', 'javascript:void(0);', $html);
					$output = str_replace('nameString', '<b>No Results Found</b>', $output);
					$output = str_replace('functionString', '<em>Please search again...</em>', $output);

					// Output
					echo($output);
					$wpdb->close();
				}

				
				
		}
	}
	

?>
