<!DOCTYPE html> 
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Sign up Page</title>
        <link rel="stylesheet" href="Style/homepageadmin.css">
    </head>

    <body>



        <dev class="conteiner">

            <form action="registeruser.php" method="POST" class="my-form" >

                <div class="button">
                    <button><a href="homepageadmin.php">Home</a></button>
                    <button><a href="bookadmin.php">Books</a></button>
                    
              
                    <button><a href="adminaddmember.php">Member</a></button>
                    <button><a href="admintransection.php">Transection</a></button>
                     <button><a href="adminbookrequest.php">Book Request</a></button>
                    <button><a href="First.php">Log out</a></button>

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

