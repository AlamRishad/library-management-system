<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Members</title>
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
        <dev class="add">
            <button><a href="adminaddmemberpage.php">Add Member </a></button>
         <br>
         <br>
         
        </dev>


        <?php



        if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){

            if(isset($_GET['param1']) && !empty($_GET['param1'])){
        ?> 
        
        <dev class="s">
        <dev class="srch">
        <input type="button" value="Member" placeholder="Enter Member ID" id="searchbtn">
        </dev>
        <dev class="sr">
        <input type="search" id="searchbox">
        </dev>
        </dev>
        
        <br>
        <br>
        <br>
        <div class="h">
        <h2><center><u>Members Details</u></center></h2>
        </div>
        <style>
            .h h2{
                color:brown;
                
            }
        </style>
        <script>
            var srcbtn=document.getElementById('searchbtn');
            srcbtn.addEventListener('click', searchprocess);

            function searchprocess(){
                var searchvalue=document.getElementById('searchbox').value;
                window.location.assign("adminsearchmember.php?param1="+searchvalue);
            }
            

        </script>
        <dev class="table1">
       <dev class="table2">
        <table>
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Email</th>
                    <th>Date Of Birth</th>
                    <th>Profession</th>
                    <th>Address</th>

                </tr>
            
            

            <tbody>
                <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $searchval=$_GET['param1'];
                    $sqlquery="";
                    if(!empty($searchval)){
                        $sqlquery="SELECT * FROM member where Mem_ID LIKE '$searchval'";
                    }


                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement

                        $productstable=$returnval->fetchAll();

                        foreach($productstable as $row){
                ?>
                <tr>
                   
                    <td><?php echo $row['Member_Name'] ?></td>   
                    <td><?php echo $row['Email'] ?></td>   
                    <td><?php echo $row['DOB'] ?></td> 
                    <td><?php echo $row['profession'] ?></td>
                    <td><?php echo $row['Address'] ?></td>   	
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
                <button onclick="window.location.href='adminaddmember.php';">Back </button>
    </dev>

        <?php  
            }
            else{
        ?>
        <script>
            window.location.assign('adminaddmember.php');
        </script>
        <?php
            }
        }
        else{
        ?>
        <script>
            window.location.assign('loginpage.php');
        </script>
        <?php
        }

        ?>
    </body>
</html>