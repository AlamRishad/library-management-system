<!DOCTYPE html> 
<html>
    <head>
        
        <meta charset="utf-8">
        <title>Add Member</title>
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
                <form action="adminaddmemberpagevarify.php" method="POST" class="cont" >
                    <br>

                    <div class="form_g">
                        <label >Member Name   : </label><br><input type="text" name="uname">
                    </div>

                    <div class="form_g">
                        <label >Email   : </label><br><input type="email" name="uemail">
                    </div>
                    <pr>Email Already Exist !!</pr>
                    <div class="form_g">
                       <br>
                        <label >Password :</label>
                        <br> <input type="password" name="upass">
                    </div>
                    <div class="form_g">
                        <label >Date Of Birth :</label><br>  <input type="date" name="udate">
                    </div>

                    <div class="form_g">
                        <label >Phone Number :</label><br>  <input type="text" name="uphone">
                    </div>
                    <div class="form_g">
                        <label >Address :</label><br>  <input type="text" name="uaddress">
                    </div>
                    <div class="form_g">
                        <label >Profession :</label><br>  <input type="text" name="uprofession">
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

