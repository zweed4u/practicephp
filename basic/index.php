<html>
<head>
<title>Hello World</title>
</head>
<body>

<form action="process.php" method="post">
    Enter your name: <input name="name" type="text">
    <input type="submit">
</form>


<?php
    // echo
    $text = "World";
    echo "Hello, " . $text . "! with `echo`<br>";
    
    // math
    $in_1 = 3;
    $in_2 = 5;
    $sum = $in_1 + $in_2;
    echo $sum . "<br>";

    // comparison
    $loggedIn = false;
    if ($loggedIn == true) {
        echo "You are logged in<br>";
    } else {
        echo "Please log in<br>";
    }

    // array
    $person1 = "Alice";
    $person2 = "Bob";

    $people = array("Alice", "Bob", "Catherine");
    // print array
    print_r($people);
    echo "<br>" . $people[0] . "<br>";
    echo $people[1] . "<br>";
    echo $people[2] . "<br>";

    foreach ($people as $person) {
        echo $person . "<br>";
    }

    // total
    $numbers = array(5, 3, 7);
    $total = 0;
    foreach ($numbers as $num) {
        $total += $num;
    }
    echo $total;

?>

</body>
</html>