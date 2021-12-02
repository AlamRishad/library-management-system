<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Book Request</title>
        <link rel="stylesheet" href="Style/BookReq.css">
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
               <br>
              </dev>
              <br>
        
            
                    <center><h1>NEW BOOK REQUEST</h1>
                  
         <form action="bookreqinsert.php" method="POST" class="my-form" >                             
                 <div class="form_group">
                     <label>Book Name </label><br><input type="text" placeholder="Enter Book Name"  name="bname">
                    <br> <br><label>Author Name </label><br><input type="text" placeholder="Enter Author Name"  name="aname">
                   <br> <br><label>Book Type </label><br><input type="text" placeholder="Enter Book Type"  name="btype">
                 </div> 
                <style>
                    label{
                       color: black;
                        
                     
                    }     
                </style>
                <br>         
            <button onclick="popUp()">Request</button>
             <script>
             function popUp(){
             alert("Successfully added")
            }
         </script>
          </form>
                 
        </center>                
 </body>
</html>

