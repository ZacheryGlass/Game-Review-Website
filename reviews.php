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
         <h1>Reviews</h1>
         <button data-toggle="collapse" data-target="#filter" type="button" class="btn btn-info">Filter Results</button>
         <div id='filter' class="collapse">
               <form action="reviews.php" method="GET">
                  <table id='filterTable'>
                     <tr>
                        <td><h4 >Filer by Game: </h4></td>
                        <td>
                           <select name="game">
                              <option value="0">All Games</option>
                              <?php 
                              try {
                                 // connect to database
                                 $mysqli = new mysqli('localhost', 'root', '', 'review spot');
                                 if ($mysqli->connect_error)
                                    throw new Exception('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);
                                 $query = "SELECT `id`, `name` FROM `games`";
                                 // load from Database 
                                 if ($result = $mysqli -> query($query)){
                                    while($record = $result -> fetch_array(MYSQLI_ASSOC)) {      
                                       print "<option value='{$record['id']}'>{$record['name']}</option>\n";
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
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <td><h4>Filter by User:</h4></td>
                        <td>
                           <select name="user">
                              <option value="0">All Users</option>
                              <?php 
                              try {
                                 // database connection previously established
                                 $query = "SELECT `id`, `username` FROM `users`";
                                 // load from Database 
                                 if ($result = $mysqli -> query($query)){
                                    while($record = $result -> fetch_array(MYSQLI_ASSOC)) {      
                                       print "<option value='{$record['id']}'>{$record['username']}</option>\n";
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
                        </td>
                     </tr>
                     <tr>
                        <td><h4>Filter by Platform: </h4></td>
                        <td>
                           <select name="platform">
                              <option value="all">All Platforms</option>
                              <option value="ps4">Play Station 4</option>
                              <option value="xb1">Xbox 1</option>
                              <option value="pc">PC</option>
                              <option value="wii_u">Wii U</option>
                        </td>
                     </tr>
                     <tr>
                        <td><h4>Filter by Rating: </h4></td>
                        <td>
                           <select name="rating">
                              <option value="0">All Ratings</option>
                              <option value="1">1 Stars</option>
                              <option value="2">2 Stars</option>
                              <option value="3">3 Stars</option>
                              <option value="4">4 Stars</option>
                              <option value="5">5 Stars</option>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <button type='submit' class='btn btn-default submit'>Submit Filter</button>
                        </td>
                     </tr>
                  </table>                              
               </form>
            </table>
         </div><!-- /#filter -->         
         <div id="accordion" role="tablist" aria-multiselectable="true">
            <?php

            // database connection established above
            try {
               // set SQL query
               $query = "SELECT `reviews`.`id` AS reviewID, `users`.`id` AS userID, `users`.`username`, `games`.`id` AS gameID, `title`, `rating`, `review`, `date_time`, `games`.`name`, ps4_available, xb1_available, pc_available, Wii_U_available FROM `reviews`, `users`, `games` WHERE `users`.`id` = `reviews`.`user` AND `reviews`.`game` = `games`.`id`";

               // filter results
               if ( isset( $_GET['game'])  && $_GET['game'] != 0) 
                  $query .= " AND `games`.`id` = '{$_GET['game']}' ";

               if ( isset($_GET['user']) && $_GET['user'] != 0)
                  $query .= " AND `users`.`id` = '{$_GET['user']}' ";

               if ( isset($_GET['platform']) && $_GET['platform'] != "all")
                  $query .= " AND `{$_GET['platform']}_available` = 1 ";

               if ( isset($_GET['rating']) && $_GET['rating'] != 0)
                  $query .= " AND `rating` = '{$_GET['rating']}'";

               // load from Database 
               if ($result = $mysqli -> query($query)){
                  while($record = $result -> fetch_array(MYSQLI_ASSOC)) {   
                     printCard($record['reviewID'], $record['name'], $record['title'], $record['review'], $record['username'], $record['date_time'], $record['rating'], $record['userID'] );
                  }// end while
               } else {
                  throw new Exception($mysqli->error);
               }// end if
            } catch (Exception $e) {
               print "<br>\n<pre>";
               print $e;
               print "</pre>\n<br>";
            }// end try-catch (SQL errors)
               
            function printCard($reviewID, $gameTitle, $reviewTitle, $review, $user, $time, $rating, $userID)
            {
                 print "<div class='card'>";
                 print "  <div class='card-header' role='tab' id='h{$reviewID}'>";
                 print "       <div class='stars'>";
                 for ($i=0; $i < $rating; $i++)
                    print "      <span class='glyphicon glyphicon-star'></span>";
                 for ($i=0; $i < 5-$rating; $i++)
                    print "      <span class='glyphicon glyphicon-star-empty'></span>";
                 print "       </div>";
                 print "    <h5 class='mb-0'>";
                 print "      <a data-toggle='collapse' data-parent='#accordion' href='#c{$reviewID}' aria-expanded='true' aria-controls='c{$reviewID}'>";
                 print "        {$reviewTitle}     ";
                 print "      </a>";
                 print "    </h5>";
                 print "    <div class='gameTitle'>";
                 print "       {$gameTitle}      ";
                 print "    </div>";
                 print "  </div>";
                 print "  <div id='c{$reviewID}' class='collapse' role='tabpanel' aria-labelledby='h{$reviewID}'>";
                 print "    <div class='card-block'>";
                 print "       " . nl2br($review);
                 print "       <br><br>";
                 print "       <blockquote>by <strong><a href='?user={$userID}'>{$user}</a></strong> at {$time}</blockquote>";
                 print "    </div>";
                 print "  </div>";
                 print "</div>";
            }// end printCard
            ?>
         </div><!-- /.accordion -->
      </div><!-- /.col-md-8 -->
   </div>
   </div>   
   <?php include "include/footer.php"; ?>
</body>
</html>
