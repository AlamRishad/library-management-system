<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Homepage</title>
        <link rel="stylesheet" href="Style/homepageadmin.css"s>
    </head>

    <body>



        <dev class="conteiner">

            <form action="registeruser.php" method="POST" class="my-form" >

                <div class="button">
                    <button><a href="homepage.php">Home</button></a>
                    <button><a href="bookMember.php">Books</a></button>
                     <button><a href="tr.php">Transection</a></button>
					 <button><a href="MyProfile.php">My Profile</a></button>
					  <button><a href="BookReq.php">Book Request</a></button>
                      <button><a href="logoutadmin.php">Log out</a></button>

                </div>


            </form>
            <div class="u">
                <?php 
                session_start();
                echo $_SESSION['useremail'];?>
                
            </div>
        </dev>

    </body>
</html>

