<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "include/head.php"; ?>
    <title>Game Reviews</title>
</head>
<body>
    <?php include "include/nav.php"; ?>
    <div class="container">
        <?php include "include/side.php"; ?>
        <div id="main" class="col-md-9">
            <h1>Games Available on 
                <?php
                    if ( isset($_GET['platform']) ) {
                        print strtoupper(str_replace('_', ' ', $_GET['platform']));
                    } else {
                        print "Any Platform";
                    }// end if-else
                ?>
            </h1>
            <hr>
            <h3>Click a title to see reviews for that game. </h3><br><br>
            <div id='gamelist'>
                <ul>    
                    <?php

                    try {
                        // connect to database
                        $mysqli = new mysqli('localhost', 'root', '', 'review spot');

                        // if errored throw exception
                        if ($mysqli->connect_error)
                            throw new Exception('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);

                        // set SQL query
                        $query = "SELECT `id`, `name`, ps4_available, xb1_available, pc_available, Wii_U_available FROM `games`";

                        // filter results
                        if ( isset( $_GET['platform'])  ) {
                            $query .= " WHERE {$_GET['platform']}_available = \"1\" ";
                        }// end if isset(...)
                            

                        // load from Database 
                        if ($result = $mysqli -> query($query)){
                            while($record = $result -> fetch_array(MYSQLI_ASSOC)) {    
                                print "<li><a href='reviews.php?game={$record['id']}'>{$record['name']}</a></li><br>";
                            }// end while
                        } else {
                            throw new Exception($mysqli->error);
                        }// end if
                    } catch (Exception $e) {
                        print "<br>\n<pre>";
                        print $e;
                        print "</pre>\n<br>";
                    }// end try-catch (SQL errors)
                        ?>
                    </ul>
                </div><!-- /#gamelist -->
                <br><hr><br>
                <h3>Don't see your favorite game?</h3>
                <button data-toggle="collapse" data-target="#addgame" type="button" class="btn btn-info" style='margin: auto;'>Add a Game</button>
                <div id='addgame' class="collapse">
                <form action="addGame.php" method="GET">
                    <table id='filterTable'>
                        <tr>
                            <td>Enter the Title:</td>
                            <td><input type="text" name="name" required></td>
                        </tr>
                        <tr>
                            <td>Is the game available on PC?</td>
                            <td>
                                <input type="radio" name="pc_available" value="1" required> Yes
                                <br>
                                <input type="radio" name="pc_available" value="0"  required> No
                            </td>
                        </tr>
                        <tr>
                            <td>Is the game available on PS4?</td>
                            <td>
                                <input type="radio" name="ps4_available" value="1" required> Yes
                                <br>
                                <input type="radio" name="ps4_available" value="0"  required> No

                            </td>
                        </tr>
                        <tr>
                            <td>Is the game available on XBOX ONE?</td>
                            <td>
                                <input type="radio" name="xb1_available" value="1" required> Yes
                                <br>
                                <input type="radio" name="xb1_available" value="0"  required> No
                            </td>
                        </tr>
                        <tr>
                            <td>Is the game available on Wii U?</td>
                            <td>
                                <input type="radio" name="wii_u_available" value="1" required> Yes
                                <br>
                                <input type="radio" name="wii_u_available" value="0"  required> No
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type='submit' class='btn btn-default submit'>Submit</button></td>
                        </tr>
                    </table>
                </form>
            </div>    
        </div><!-- /.col-md-9 -->
    </div>
    </div>    
    <?php include "include/footer.php"; ?>
</body>
</html>
