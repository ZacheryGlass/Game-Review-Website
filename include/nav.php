<nav class="navbar navbar-inverse navbar-fixed-top">
        
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Gamer's Review Spot</a>
            </div> <!-- end navebar-header -->

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="reviews.php">All Reviews</a></li>
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Browse by Game System
                            <span class='caret'></span>
                        </a>
                        <ul class='dropdown-menu'>
                            <li><a href="gameList.php?platform=pc">PC Games</a></li>
                            <li><a href="gameList.php?platform=xb1">Xbox One Games</a></li>
                            <li><a href="gameList.php?platform=ps4">PS4 Games</a></li>
                            <li><a href="gameList.php?platform=wii_u">Wii U Games</a></li>
                        </ul>
                    </li>
                    <li><a href="submit.php">Submit a Review</a></li>
                    <?php 
                    session_start();
                    if (isset($_SESSION['id'])) {
                        // user is logged in
                        print "<li class='dropdown'>
                                   <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>{$_SESSION['username']}
                                        <span class='caret'></span>
                                    </a>
                                    <ul class='dropdown-menu'>
                                        <li><a href='logout.php'>Sign Out</a></li>
                                    </ul>
                                </li>";    
                    } else {
                        print "<li><a href='login.php'>Login</a></li>";
                    }// end if (user is logged in)
                     ?>
                    
                </ul>
            </div> <!--end .nav-collapse -->
        </div>
    </nav>