<?php 
foreach ($_GET as $key => $value) {
    print "Key: " . $key . "<br>Value: " . $value . "<br><br>";
}

try {
    // connect to database
    $mysqli = new mysqli('localhost', 'root', '', 'review spot');

    // if errored throw exception
    if ($mysqli->connect_error)
        throw new Exception('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);

    // set SQL query
    $query = "INSERT INTO games (name, ps4_available, xb1_available, pc_available, Wii_U_available) VALUES ('{$_GET['name']}', '{$_GET['ps4_available']}', '{$_GET['xb1_available']}', '{$_GET['pc_available']}', '{$_GET['Wii_U_available']}')";

    // save to Database 
    if (!$result = $mysqli -> query($query)){
        throw new Exception($mysqli->error);
    }// end if
} catch (Exception $e) {
    print "<br><pre>";
    print $e;
    print "</pre><br>";
}// end try-catch
header("Location: gameList.php");

 ?>