<?php
    //Returns an array of all the marks
    function retrieveMarks($courseName) {
        $fileName = $courseName . ".txt";
        $Dir = "./Courses";
        $DirOpen = opendir($Dir);
        while ($CurFile = readdir($DirOpen)) {
            if ($fileName == $CurFile) {
                $content = file("./Courses/" . $fileName);            
                
                for ($i=0; $i<count($content); ++$i) {
                    $courseContent = explode(", ", $content[$i]);
                }
                $count = 0;
                for ($i=0; $i<sizeof($courseContent)/2; $i++) {
                    for ($c=0; $c<2; ++$c){
                        $weight[$i][$c] = $courseContent[$count++];
                    }
                }
            return $weight;
            }
        }
    }

    //Generates a div for each course
    function generateDiv($courseName) {
        $array = retrieveMarks($courseName);
        echo "<div class='grades' id='" . $courseName . "'>";
        echo "<h3>" . $courseName . "</h3>";
            for($i = 0; $i < sizeof($array); $i++) {
                echo $array[$i][0] . ": ";
                echo $array[$i][1] . "<br/>";
            }

            foreach (getCategoryArray($array) as $category) {
                echo "<P>";
                echo $category . " average is " . calcCategoryAvg($category, $array);
                echo "</P>";
            } 
        echo "</div>";
    }

    //Returns all courses in the text file
    function getCourses() {
        $file = "./Courses/term1courses.txt";
        $line = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        return $line;
    }

    //Gets an array of all the categories for that course
    function getCategoryArray($array) {
        $tempArray = array();
        $count = 0;
        foreach ($array as $category) {
            if (ctype_alnum($category[0])) {
                $category[0] = preg_replace("/[^a-zA-Z,.]/", "", $category[0] );
                if (!in_array($category[0], $tempArray)) {
                    array_push($tempArray, $category[0]);
                }
            }
        }
        return $tempArray;
    }

    //Returns the average for each category
    function calcCategoryAvg($category, $marksArray) {
        $count = 0;
        $sum = 0;
        foreach ($marksArray as $entry) {
            if (strpos($entry[0], $category) !== false) {
                $count += 1;
                $sum += $entry[1];
            }
        }
        return $sum / $count;
    }
?>

<html>
<head>
<style>
    h1#title {
        text-align: center;
    }
    .grades {
        background-color: red;
        color: white;
    }
</style>
</head> 
<body>
<h1 id="title">Results</h1>
<?php
    //Generates the divs for all courses that were selected
    for ($j = 0; $j < count(getCourses()); $j++) {
        $temp = getCourses()[$j];
        if ($_GET[$temp . 'credit'] > 0) {
            generateDiv(getCourses()[$j]);
        };    
    }
?>
</body>
</html>