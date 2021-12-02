<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Log In Page</title>
        <link rel="stylesheet" href="Style/login.css">
    </head>

    <body>


        <dev class = "box1">
            <h1>LIBRARY MANAGEMENT SYSTEM</h1>

         </dev>
         <dev class="conteiner">
        <dev class = "box2">
            <form action="varifyadmin.php" method="POST"  >

                <label >Email   :</label> <br> <input type="email" placeholder="Enter Your Email"name="uemail"><br><br>
                <label >Password:</label><br><input type="password"
                placeholder="Enter Your Password" name="upass"><br><br>
                <pr>Invalid email or password</pr><br>
                   <div class="button">
                    
                   
                <input type="submit" value="login">
                </div>
                
            </form>
           </dev>
        </dev>
    </body>
</html>