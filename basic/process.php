<html>
<head>
<title>Hello World</title>
</head>
<body>

<?php
    // handle html forms ($_POST is an array from form submission)
    $name = $_POST["name"];
    echo "Hello, " . $name;
?>

</body>
</html>