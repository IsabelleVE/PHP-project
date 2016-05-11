<?php
include("classes/Db.class.php");


try {
    $conn =  Db::getInstance();
    $statement = $conn->prepare("UPDATE MyGuests SET lastname='Doe' WHERE id=2");




    // Prepare statement
    $stmt = $conn->prepare($statement);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $statement . "<br>" . $e->getMessage();
    }

$conn = null;
?>



<html>
<head>
<title>Settings</title>
</head>

<body>


</body>
</html>
