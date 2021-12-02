<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Sign up Page</title>
        <link rel="stylesheet" href="Style/signup.css">
    </head>

    <body>


        <dev class = "box1">
            <h1>LIBRARY MANAGEMENT SYSTEM</h1>

        </dev>
        <dev class="conteiner">

            <form action="registeruser.php" method="POST" class="my-form" >

                <div class="form_group">
                    <label >Name   : </label><br><input type="text" name="uname">
                </div>
               
                    <div class="form_group">
                    <label >Email   : </label><br><input type="email" name="uemail">
                </div>
                <div class="form_group">
                    <label >Password:</label>
                    <br> <input type="password" name="upass">
                </div>
                <div class="form_group">
                    <label >D o B :</label><br>  <input type="date" name="udate">
                </div>
            
                <div class="form_group">
                    <label >Phone_Number :</label><br>  <input type="text" name="uphone">
                </div>
                <div class="form_group">
                    <label >Address :</label><br>  <input type="text" name="uaddress">
                </div>
                <div class="form_group">
                    <label >Profession :</label><br>  <input type="text" name="uprofession">
                </div>
                <div class="form_gender">
                    <label >Gender :</label>  <input type="radio" name="Gender">Male<input type="radio" name="Gender">Female
                </div>
                <div class="button">
                    <input type="submit" value="save">
                </div>

            </form>
        </dev>
    </body>
</html>