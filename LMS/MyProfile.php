<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>My profile</title>
        <link rel="stylesheet" href="Style/homepageadmin.css">
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

              <dev class="back">
                <button onclick="window.location.href='homepage.php';">Back </button>
          </dev>
  <dev class="table3">
       <dev class="table2">
        <center>
           <table>
            <thead>
               

            <tbody>
                <?php
            try{

                $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $mail=$_SESSION['useremail'];
                $sqlquery="SELECT image from member where Email='$mail'";

                try{
                    $returnval=$dbcon->query($sqlquery);

                    $custtable=$returnval->fetchAll();

                    foreach($custtable as $row){
                ?>
                
                <tr>
                   
                    <td> <img width="150" height="150" alt="Not Uploaded Yet" src="<?php echo $row['image'] ?>"></td>   											
                </tr>
                <?php
                    }
                }
                catch(PDOException $ex){
                ?>
                <tr>
                    <td colspan="1">Data read error ... ...</td>    
                </tr>
                <?php
                }

            }
            catch(PDOException $ex){
                ?>
                <tr>
                    <td colspan="4">Data read error ... ...</td>    
                </tr>
                <?php
            }
                ?>
                
            </tbody>
        </table>
        </center>
        
          
          

     <center>
     <form action="updatephoto.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="dimage"><br><br>
    <input type="submit" value="Upload photo">       </form> 
       </center>
        

        <center><h1>Update Information</h1>
        <div class="box2">
        <form action="Updateprofile.php" method="POST">
              
            <div class="box1">  
                Old Email: <br><input type="email" placeholder="Enter your old email" name="uemail"><br><br>         
                New Email:<br> <input type="email" placeholder="Enter your new email"   name="nemail"><br><br>
                                  <input type="submit" value="Apply changes">
            </div> 
            <div class="box1"> 
               <br> Old password: <br><input type="password" placeholder="Enter your old password" name="upass"><br><br>  
                New password:<br> <input type="password" placeholder="Enter your new password"   name="npass"><br><br>
            </div> 
            

            <input type="submit" value="Apply changes">
        </form>
        </div> 
        </center>
        <br>
       

    </body>
</html>

