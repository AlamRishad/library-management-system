<!DOCTYPE html> 
<html>
    <head>
       
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
            <button><a href="adminaddmemberpagevarify.php">Add Member </a></button>
        </dev>
        <br>



        <?php
        if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){
        ?>    
        <br>
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
        <h2><center><u>Members Details</u></center></h2>
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
                            <th>Member ID</th>
                            <th>Member Name</th>
                            <th>Email</th>
                            <th>Date Of Birth</th>
                            <th>Profession</th>

                            <th>Address</th>


                        </tr>



                    <tbody>
                        <?php
            try{

                $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sqlquery="SELECT Mem_ID,Member_Name,Email,DOB,profession,Address FROM member";

                try{
                    $returnval=$dbcon->query($sqlquery);

                    $custtable=$returnval->fetchAll();

                    foreach($custtable as $row){
                        ?>

                        <tr>
                            <td><?php echo $row['Mem_ID'] ?></td>   
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
                            <td colspan="6">Data read error ... ...</td>    
                        </tr>
                        <?php
                }

            }
            catch(PDOException $ex){
                        ?>
                        <tr>
                            <td colspan="6">Data read error ... ...</td>    
                        </tr>
                        <?php
            }
                        ?>

                    </tbody>
                </table>

                <br>
                <br>
                <dev class="back">
                    <button onclick="window.location.href='homepageadmin.php';">Back </button>
                </dev>

            </dev>
            <br>
        </dev>


        <?php
        }
        else{

        ?>
        <script>
            window.location.assign('homepageadmin.php');
        </script>
        <?php
        }
        ?>


    </body>
</html>