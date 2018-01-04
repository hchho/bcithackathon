<?php
    
    //Returns an array of all the marks as [assignment][weight]
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

    function getWeight($courseName) {
        $array = retrieveMarks($courseName);
        $tempName = array();
        $tempWeight = array();
        $count = 0;
        foreach ($array as $elem) {
            // $end = substr($elem[0], strlen($key) - 5, strlen($key) - 1);
            // if(substr($elem[0], 0, 3) == $courseName && $end != "value" && $end != "redit") {
                if (!in_array(substr($elem[0], 0, 3), $tempName)) { 
                    $tempName[$count] = substr($elem[0], 0, 3);
                    $tempWeight[$count] = $elem[1];
                    $count++; 
                }
            // }
        }
        print_r($tempWeight);
        return $tempWeight;
    }

    //Returns scores as an array for course name
    function retrieveScores($courseName) {
        $temp = array();
        $i = 0;
        foreach ($_POST as $key => $value) {
            $end = substr($key, strlen($key) - 5, strlen($key) - 1);
            if(substr($key, 0, 8) == $courseName && $end != "value" && $end != "redit") {
                $temp[$i][0] = $key;
                $temp[$i][1] = $value;
                $i++;
            }
        }
        return $temp;
    }

    //Generates a div for each course
    function generateDiv($courseName) {
        $array = retrieveMarks($courseName);
        echo "<div class='grades' id='" . $courseName . "'>";
        echo "<h3>" . $courseName . "</h3>";
            foreach (getCategoryArray($array) as $category) {
                echo "<P>";
                echo $category . " average is " . calcCategoryAvg($category, retrieveScores($courseName));
                echo "</P>";
            } 
            echo "<div class='courseMark' id='" . $courseName . "'>";
            echo "Final course mark: " . getCourseMark($courseName) . " / 100</br>";
            echo "</div>";
        echo "</div>";
    }

    //Returns course credit achieved using course name and final course mark
    function getCourseCredit($courseName, $courseMark) {
        return $_POST[$courseName . 'Credit'] * $courseMark;
    }   

    function getTermGPA() {
        $sum = 0;
        $creditCount = 0;
        $courseArray = getCourses();
        foreach (getCourses() as $course) {
            if($_POST['is'.$course] > 0) {
            $sum += getCourseCredit($course, getCourseMark($course));
            $creditCount += $_POST[$course . 'Credit'];
            }
        }
        return $sum / $creditCount;
    }

    //Returns all courses in the text file as [coursename]
    function getCourses() {
        $file = "./Courses/term1courses.txt";
        $line = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        return $line;
    }
    
    //Returns final course mark given an array of marks
    function getCourseMark($courseName) {
        $catArray = getCategoryArray(getCourses($courseName));
        $count = 0;
        $temp = array();
        foreach ($catArray as $cat) {
           $temp[$count] = calcCategoryAvg($cat, retrieveScores($courseName));
           $count++;
        }
        $final = 0;
        for ($i = 0; $i < sizeof($temp); $i++) {
            $elem = $temp[$i] / 100 * getWeight($courseName)[$i];
            $final += $elem;
        }
        return $final;
    }

    //Gets an array of all the categories for that course as [category]
    function getCategoryArray($courseArray) {
        $tempArray = array();
        $count = 0;
        foreach ($courseArray as $category) {
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
    function calcCategoryAvg($category, $scoreArray) {
        $count2 = 0;
        $sum2 = 0;
        foreach ($scoreArray as $entry2) {
            if (strpos($entry2[0], $category) !== false) {
                if ($entry2[1] > 0) {
                    $count2 += 1;
                    $sum2 += $entry2[1];
                }
            }
        }
        if ($count2 > 0) {
        return $sum2 / $count2;
        } else {
            $score = 0;
        }
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
    echo "<P>Term GPA: ";
    echo getTermGPA();
    echo "</p>";
    //Generates the divs for all courses that were selected
    for ($i = 0; $i < count(getCourses()); $i++) {
        $temp = getCourses()[$i];
        if ($_POST['is'.$temp] > 0) {
            generateDiv(getCourses()[$i]);
        };    
    }
?>
</body>
</html>