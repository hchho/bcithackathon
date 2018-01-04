<?php
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
                for ($i=0; $i<sizeof($courseContent); ++$i) {
                    for ($c=0; $c<2; ++$c){
                        $weight[$i][$c] = $courseContent[$count];
                        $count++;
                    }
                }
        return $weight;
    }
        }
    }
    function generateDiv($array) {
        // echo $array[0][0];
        echo "<div>";
            for($i = 0; $i < sizeof($array); $i++) {
                echo $array[$i][0] . ": ";
                echo $array[$i][1] . "<br/>";
            }
        echo "</div>";
    }
?>

<html>
<head>
<style>
    h1#title {
        text-align: center;
    }
</style>
</head> 
<body>
<h1 id="title">Results</h1>
<?php

    // if($_POST['COMP1510credit'] > 0) {
        $COMP1510 = retrieveMarks("COMP1510");
        generateDiv($COMP1510);
    // }
    if($_POST['COMP1536credit'] > 0) {
     
    }
    if($_POST['COMP1113credit'] > 0) {
        
    }
    if($_POST['COMP1111credit'] > 0) {
        
    }
    if($_POST['COMP1111credit'] > 0) {
        
    }
?>
Category average

Course averages
Term average
</body>
</html>