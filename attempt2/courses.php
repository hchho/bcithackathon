<?php

//Course List
$courseListFile = "./Courses/test.txt";

//split the courses into an array
$test = file($courseListFile);
$courseArray = array(explode(", ", $test[0]));

//count how many courses are in the file
$counter = 0;
for ($i = 0; $i < 10; $i++) {
    if ($courseArray[0][$i] != "") {
        $counter++;
    }
}

//echo print_r($courseArray);

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
    <!-- Side navigation -->
    <div class="tab">
        <?php

        if (isset($_POST["TERM1"])) {
            for ($j = 0; $j <= $counter; $j++) {
                echo "<button class=\"tablinks\" onclick=\"openCourse(event, '" . $courseArray[0][$j] . "')\">" . $courseArray[0][$j] . "</button>";
            }
        }
        ?>
    </div>
    <?php
    if (isset($_POST["TERM1"])) {
        echo "<form action='index.php' method='post'>";
        echo "<div id=\"COMP1111\" class=\"tabcontent\">
        <h3>COMP 1111</h3>";
        echo "Enrolled? <input type=\"checkbox\" name=\"COMP1111\" value=\"COMP1111\" id=\"isCOMP1111\">";
        $Dir = "./Courses";
        $DirOpen = opendir($Dir);
        while ($CurFile = readdir($DirOpen)) {
            if ("COMP1111.txt" == $CurFile) {
                $content = file("./Courses/COMP1111.txt");

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

                echo "<div class = 'd'>";

                for ($i = 0; $i < sizeof($courseContent) / 2; ++$i) {
                    echo $weight[$i][0] . " " . "<input type = 'text' name='COMP1111" . $weight[$i][0] . "'>" . "<br>";
                    echo "<input type='hidden' name='COMP1111" . $weight[$i][0] . "' value='" . $weight[$i][1] . "'>";
                }

                echo "</div>";
            }

        }
        closedir($DirOpen);
        echo "</div>";

        echo "<div id=\"COMP1113\" class=\"tabcontent\">
        <h3>COMP 1113</h3>";
        echo "Enrolled? <input type=\"checkbox\" name=\"COMP11113\" value=\"COMP11113\" id=\"isCOMP11113\">";
        $Dir = "./Courses";
        $DirOpen = opendir($Dir);
        while ($CurFile = readdir($DirOpen)) {
            if ("COMP1113.txt" == $CurFile) {
                $content = file("./Courses/COMP1113.txt");

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

                echo "<div class = 'd'>";

                for ($i = 0; $i < sizeof($courseContent) / 2; ++$i) {
                    echo $weight[$i][0] . " " . "<input type = 'text' name='COMP1113" . $weight[$i][0] . "'>" . "<br>";
                    echo "<input type='hidden' name='COMP1113" . $weight[$i][0] . "' value='" . $weight[$i][1] . "'>";
                }

                echo "</div>";
            }

        }
        closedir($DirOpen);
        echo "</div>";

        echo "<div id = \"COMP1510\" class=\"tabcontent\">
        <h3>COMP 1510</h3>";
        echo "Enrolled? <input type=\"checkbox\" name=\"COMP1510\" value=\"COMP1510\" id=\"isCOMP1510\">";
        echo "<br/>";

            $Dir = "./Courses";
        $DirOpen = opendir($Dir);
        while ($CurFile = readdir($DirOpen)) {
            if ("COMP1510.txt" == $CurFile) {
                $content = file("./Courses/COMP1510.txt");

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

                echo "<div class = 'd'>";

                for ($i = 0; $i < sizeof($courseContent) / 2; ++$i) {
                    echo $weight[$i][0] . " " . "<input type = 'text' name='comp1510" . $weight[$i][0] . "'>" . "<br>";
                    echo "<input type='hidden' name='comp1510" . $weight[$i][0] . "' value='" . $weight[$i][1] . "'>";
                }

                echo "</div>";
            }

        }
        closedir($DirOpen);
        echo "</div>";

        echo "<div id=\"COMP1536\" class=\"tabcontent\">
        <h3>COMP 1536</h3>";
        echo "Enrolled? <input type=\"checkbox\" name=\"COMP1536\" value=\"COMP1536\" id=\"isCOMP1536\">";
        $Dir = "./Courses";
        $DirOpen = opendir($Dir);
        while ($CurFile = readdir($DirOpen)) {
            if ("COMP1536.txt" == $CurFile) {
                $content = file("./Courses/COMP1536.txt");

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

                echo "<div class = 'd'>";

                for ($i = 0; $i < sizeof($courseContent) / 2; ++$i) {
                    echo $weight[$i][0] . " " . "<input type = 'text' name='COMP1536" . $weight[$i][0] . "'>" . "<br>";
                    echo "<input type='hidden' name='COMP1536" . $weight[$i][0] . "' value='" . $weight[$i][1] . "'>";
                }

                echo "</div>";
            }

        }
        closedir($DirOpen);
        echo "</div>";

        echo "<div id=\"COMM1116\" class=\"tabcontent\"> 
        <h3>COMM 1116</h3>";
        echo "Enrolled? <input type=\"checkbox\" name=\"COMP1116\" value=\"COMP1116\" id=\"isCOMP1116\">";
        $Dir = "./Courses";
        $DirOpen = opendir($Dir);
        while ($CurFile = readdir($DirOpen)) {
            if ("COMM1116.txt" == $CurFile) {
                $content = file("./Courses/COMM1116.txt");

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

                echo "<div class = 'd'>";

                for ($i = 0; $i < sizeof($courseContent) / 2; ++$i) {
                    echo $weight[$i][0] . " " . "<input type = 'text' name='COMM1116" . $weight[$i][0] . "'>" . "<br>";
                    echo "<input type='hidden' name='COMP1536" . $weight[$i][0] . "' value='" . $weight[$i][1] . "'>";
                }

                echo "</div>";
            }

        }
        closedir($DirOpen);

        echo "</div>";

        "<div id=\"BUSA2720\" class=\"tabcontent\">
        <h3>BUSA 2720</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorem est, ipsum perferendis quisquam
            ratione sed suscipit. Ab accusamus, adipisci asperiores consequuntur deleniti doloribus maiores mollitia
            nemo quaerat saepe tenetur!</p>
    </div>";
    }


    echo "</div>";


    echo "<div class=\"footer\">";
    echo "<input type=\"submit\">";
    echo "</div>";
    echo "</form>";
    ?>
</body>

</html>

