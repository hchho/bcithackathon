<?php

//Course List
$courseListFile = "./Courses/term1courses.txt";

//split the courses into an array
$courseArray = file($courseListFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

//count how many courses are in the file
$counter = 0;
for ($i = 0; $i < count($courseArray); $i++) {
    if ($courseArray[$i] != "") {
        $counter++;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./index.js"></script>
    <title>GPA Calculator</title>
</head>

<body>
<div class="row">
    <!-- Navigation -->
    <div class="tab">
        <?php
        if (isset($_POST["TERM1"])) {
            for ($j = 0; $j <= $counter; $j++) {
                echo "<button class=\"tablinks\" onclick=\"openCourse(event, '" . $courseArray[$j] . "')\">" . $courseArray[$j] . "</button>";
            }
        }
        ?>
    </div>
    <?php
    
    if (isset($_POST["TERM1"])) {
        
        echo "<form action='results.php' method='post'>";
        foreach ($courseArray as $course) {
            echo "<div id='" . $course . "' class=\"tabcontent\">";
            echo "<h3>". $course . "</h3>";
            echo "Enrolled? <input type=\"checkbox\" name=\"is".$course."\" value=\"1\" id=\"is".$course."\">";
            $Dir = "./Courses";
            $DirOpen = opendir($Dir);
            while ($CurFile = readdir($DirOpen)) {        
                $courseFile = $course . ".txt";
                if ($courseFile == $CurFile) {   
                    $content = file("./Courses/".$course.".txt");
                    for ($i = 0; $i < count($content); ++$i) {
                        $courseContent = explode(", ", $content[$i]);
                    }
                    $count = 0;

                    for ($i = 0; $i < sizeof($courseContent); ++$i) {
                        for ($c = 0; $c < 2; ++$c) {
                            $weight[$i][$c] = $courseContent[$count];
                            $count++;
                        }
                    }
                }
            }

            echo "<div class='container'>";

            for ($i = 0; $i < sizeof($courseContent) / 2; ++$i) {
                echo "<div>" . $weight[$i][0] . " " . "</div>" . "<input type = 'text' name='". $course . $weight[$i][0] . "'>" . "<br>";
                echo "<input type='hidden' name='".$course . $weight[$i][0] . "value' value='" . $weight[$i][1] . "'>";

            }
            echo "<input type='hidden' name='".$course."Credit' value='" . 4 . "'>";
            echo "</div>";            
            echo "</div>";
            closedir($DirOpen);
        }
         


        echo "<div id=\"BUSA2720\" class=\"tabcontent\">
        <h3>BUSA 2720</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorem est, ipsum perferendis quisquam
            ratione sed suscipit. Ab accusamus, adipisci asperiores consequuntur deleniti doloribus maiores mollitia
            nemo quaerat saepe tenetur!</p>
        </div>";
    }


    echo "</div>";


    echo "<input type=\"submit\">";

    echo "</form>";
    ?>
</body>

</html>

