<?php
if (isset($_POST["TERM1"])) {
//    echo "worked";
}
//Course List
$courseListFile = "./test.txt";

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
    <div class="tab col-xs-2">
        <?php
        for ($j = 0; $j <= $counter; $j++) {
            echo "<button class=\"tablinks\" onclick=\"openCourse(event, '" . $courseArray[0][$j] . "')\">" . $courseArray[0][$j] . "</button>";
        }
        ?>
    </div>

    <div id="COMP1111" class="tabcontent">
        <h3>COMP 1111</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorem est, ipsum perferendis quisquam
            ratione sed suscipit. Ab accusamus, adipisci asperiores consequuntur deleniti doloribus maiores mollitia
            nemo quaerat saepe tenetur!</p>
    </div>

    <div id="COMP1113" class="tabcontent">
        <h3>COMP 1113</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorem est, ipsum perferendis quisquam
            ratione sed suscipit. Ab accusamus, adipisci asperiores consequuntur deleniti doloribus maiores mollitia
            nemo quaerat saepe tenetur!</p>
    </div>

    <div id="COMP1510" class="tabcontent">
        <h3>COMP 1510</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorem est, ipsum perferendis quisquam
            ratione sed suscipit. Ab accusamus, adipisci asperiores consequuntur deleniti doloribus maiores mollitia
            nemo quaerat saepe tenetur!</p>
    </div>

    <div id="COMP1536" class="tabcontent">
        <h3>COMP 1536</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorem est, ipsum perferendis quisquam
            ratione sed suscipit. Ab accusamus, adipisci asperiores consequuntur deleniti doloribus maiores mollitia
            nemo quaerat saepe tenetur!</p>
    </div>

    <div id="COMM1116" class="tabcontent">
        <h3>COMM 1116</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorem est, ipsum perferendis quisquam
            ratione sed suscipit. Ab accusamus, adipisci asperiores consequuntur deleniti doloribus maiores mollitia
            nemo quaerat saepe tenetur!</p>
    </div>

    <div id="BUSA2720" class="tabcontent">
        <h3>BUSA 2720</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorem est, ipsum perferendis quisquam
            ratione sed suscipit. Ab accusamus, adipisci asperiores consequuntur deleniti doloribus maiores mollitia
            nemo quaerat saepe tenetur!</p>
    </div>
</div>


</body>

</html>

