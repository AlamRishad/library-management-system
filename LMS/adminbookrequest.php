<!DOCTYPE html> 
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Book Request</title>
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
        <br>
           <dev class="add">
            <button><a href="bookadd.php">Add Book </a></button>
        </dev>
        <br>
        <br>



        <?php
        if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){
        ?>    
        <br>
        <h2><center><u>Book Request</u></center></h2>
        <br>
        <dev class="s">
            <dev class="srch">

                <input type="button" value="Book Search" id="searchbtn">
            </dev>
            <dev class="sr">
                <input type="search" placeholder="Enter Book Name" id="searchbox">
            </dev>
        </dev>

        <br>
        <br>
        <br>
        
        <script>
            var srcbtn=document.getElementById('searchbtn');
            srcbtn.addEventListener('click', searchprocess);

            function searchprocess(){
                var searchvalue=document.getElementById('searchbox').value;
                window.location.assign("adminbookrequest.php?param1="+searchvalue);
            }


        </script>
        <dev class="table1">
            <dev class="table2">
                <table>
                    <thead>
                        <tr>
                            
                            <th>Book Name</th>
                            <th>Book Type</th>
                            <th>Author</th>
                            

                        </tr>



                    <tbody>
                        <?php
            try{

                $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sqlquery="SELECT Book_Name,Book_Type,Author FROM new_books";

                try{
                    $returnval=$dbcon->query($sqlquery);

                    $custtable=$returnval->fetchAll();

                    foreach($custtable as $row){
                        ?>

                        <tr>   
                            <td><?php echo $row['Book_Name'] ?></td>
                            <td><?php echo $row['Book_Type'] ?></td>
                               <td><?php echo $row['Author'] ?></td>   
                             
											
                        </tr>
                        <?php
                    }
                }
                catch(PDOException $ex){
                        ?>
                        <tr>
                            <td colspan="3">Data read error ... ...</td>    
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