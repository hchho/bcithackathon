<?php
	$Dir = "./styles";
	$DirOpen = opendir($Dir);
    while ($CurFile = readdir($DirOpen)) {
		if("COMP1113" == $CurFile){
			$content = file("./styles/COMP1113");			
			
			for ($i=0; $i<count($content); ++$i) {
				$courseContent = explode(", ", $content[$i]);
			}
			
			$count = 0;
			
			for ($i=0; $i<sizeof($courseContent); ++$i) {
				for ($c=0; $c<2; ++$c){
					$weight[$i][$c] = $courseContent[$count];
					$count++;
				}
			}
			
			echo "<div class = 'd'>";
			
			for($i=0; $i<sizeof($courseContent) / 2; ++$i){
				echo $weight[$i][0] . " " ."<input type = 'text' name='COMP1113" . $weight[$i][0] . "'>"."<br>";
				echo "<input type='hidden' name='COMP1113" . $weight[$i][0] . "' value='". $weight[$i][1] . "'>";
			}
			
			echo "</div>";
		}
		
    }
	closedir($DirOpen);
?>