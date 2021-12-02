<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <title>Books</title>
        <link rel="stylesheet" href="Style/homepageadmin.css">
    </head>
    <body>
        <dev class="conteiner">
            <form action="registeruser.php" method="POST" class="my-form" >
                <div class="button">
         <button><a href="homepage.php">Home</a></button>
		 
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
 <center>  
  <form action="rate.php" method="POST" >
  
 <label >Book ID: </label> <input type="text" name="bid">
 <br>
  <input type="radio"id="s1" name="rate" value=1>
  <label>1</label><br>
  
 <input type="radio"id="s2" name="rate" value=2>
  <label>2</label><br>
  
   <input type="radio"id="s3" name="rate" value=3>
  <label>3</label><br>
  
   <input type="radio"id="s4" name="rate" value=4>
  <label>4</label><br>
  
   <input type="radio"id="s5" name="rate" value=5>
   <label>5</label><br>
   <label>Already rated !!</label><br>
  <input type="submit" value="Submit">
</form>
    </center>      

        <?php
        if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){
        ?>    
        <br>
        <dev class="s">
        <dev class="srch">
        
        <input type="button" value="Book Search" id="searchbtn">
        </dev>
        <dev class="sr">
        <input type="search" id="searchbox">
        </dev>
        </dev>
        
        <br>
        <br>
        <br>
        <h2><center><u>Books Details</u></center></h2>
        <script>
            var srcbtn=document.getElementById('searchbtn');
            srcbtn.addEventListener('click', searchprocess);

            function searchprocess(){
                var searchvalue=document.getElementById('searchbox').value;
                window.location.assign("searchmember.php?param1="+searchvalue);
            }
            

        </script>
<dev class="table1">
       <dev class="table2">
        <table>
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>ISBN</th>
                    <th>Rating</th>
                    <th>Availability</th>

                </tr>
            
            

            <tbody>
                <?php
            try{

                $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sqlquery="SELECT Book_Name,Book_ID,Available_Status,Rating,ISBN FROM book";

                try{
                    $returnval=$dbcon->query($sqlquery);

                    $custtable=$returnval->fetchAll();

                    foreach($custtable as $row){
                ?>
                
                <tr>
                    <td><?php echo $row['Book_ID'] ?></td>   
                    <td><?php echo $row['Book_Name'] ?></td>   
                    <td><?php echo $row['ISBN'] ?></td>   
                    <td><?php echo $row['Rating'] ?></td> 
                    <td><?php echo $row['Available_Status'] ?></td>   											
                </tr>
                <?php
                    }
                }
                catch(PDOException $ex){
                ?>
                <tr>
                    <td colspan="5">Data read error ... ...</td>    
                </tr>
                <?php
                }

            }
            catch(PDOException $ex){
                ?>
                <tr>
                    <td colspan="5">Data read error ... ...</td>    
                </tr>
                <?php
            }
                ?>
                
            </tbody>
        </table>
        
        <br>
        <br>
        <dev class="back">
                <button onclick="window.location.href='homepage.php';">Back </button>
    </dev>

   </dev>
        <br>
        </dev>
        

        <?php
        }
        else{

        ?>
        <script>
            window.location.assign('homepage.php');
        </script>
        <?php
        }
        ?>


    </body>
</html>