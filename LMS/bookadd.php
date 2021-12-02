<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Add Book</title>
        <link rel="stylesheet" href="Style/addbook.css">
    </head>

    <body>



        <dev class="conteiner">


            <div class="button">
                <button><a href="homepageadmin.php">Home</a></button>
                <button><a href="bookadmin.php">Books</a></button>

                    <button><a href="adminaddmember.php">Member</a></button>
                <button><a href="admintransection.php">Transection</a></button>
                 <button><a href="adminbookrequest.php">Book Request</a></button>
                <button><a href="First.php">Log out</a></button>

            </div>

            <div class="u">
                <?php 
                session_start();

                echo $_SESSION['useremail'];?>
            </div>
            
                <button><a href="bookadmin.php">back</a></button>
        </dev>
        <center>
        <dev class="dorker">
            <form action="adminbookaddvarify.php" method="POST" class="cont" >
                <br>

                <div class="form_g">
                    <label >Book ID   : </label><br><input type="text" name="bID">
                </div>
                
                <div class="form_g">
                    <label >Book Name   : </label><br><input type="text" name="bname">
                </div>

                <div class="form_g">
                    <label >ISBN   : </label><br><input type="text" name="bISBN">
                </div>
                <div class="form_g">
                    <label >Availability</label>
                    <br> <input type="text" name="bavailable">
                </div>
                <div class="form_g">
                    <label >Book Type :</label><br>  <input type="text" name="btype">
                </div>

                <div class="form_g">
                    <label >Author Name :</label><br>  <input type="text" name="bauthor">
                </div>

                <div class="button">
                    <input type="submit" value="save">
                </div>
                <br>

            </form>
        </dev>
        </center>
        

    </body>
</html>

