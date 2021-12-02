<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Transection</title>
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
        </dev>
<dev class="conti">
        <form action="adminborrow.php" method="POST" class="my-form" >

            <dev class="table3">
                <dev class="table4">
                    <center>

                        <table>
                            <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Book ID</th>
                                    <th>Issue Date</th>
                                    <th>Due Date</th>
                                </tr>


                                <tr>
                                    <td><input type="text" name="s1">  </td>
                                    <td><input type="text" name="s2">  </td>
                                    <td><input type="date" name="s3">  </td>
                                    <td><input type="date" name="s4">  </td> 
                                </tr>
                               



                            </thead>
                        </table>
                    </center>
                  

                    <center>
                        <div class="button">
                        <p>invalid Member or Book Id</p>
                        <input type="submit" value="Issue Book">
            </div>
                    </center>
                    <style>

                        .button{
                            padding:10px;
                        }

                    </style>
                    <style>

                         .button input{
                            padding:10px;
                            border-color: #ffff00;
                            margin: 1em;
                            background-color: #ffff00; 
                            border-radius: 50%;
                        }
                        .table3 th{
                            color: aliceblue;
                        }
                        .table3 table{
                            width:70%;
                            text-align: center;
                            background-color:crimson;
                            padding:20px;
                            background-image: url(Image/2560x1440-blue-abstract-noise-free-website-background-image.jpg);
                            color: aliceblue;


                        }

                    </style> 


                </dev>
            </dev>    
        </form>
        </dev>
        <form action="adminreturn.php" method="POST" class="my-form" >
            <dev class="table3">
                <br>
                <br>
                <dev class="table4">
                    <center>
                        <table>
                            <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Book ID</th>
                                    <th>Return Date</th>
                                    <th>Fine</th>
                                </tr>


                                <tr>
                                    <td><input type="text" name="s5">  </td>
                                    <td><input type="text" name="s6">  </td>
                                    <td><input type="date" name="s7">  </td>
                                    <td><input type="text" name="s8">  </td> 
                                </tr>
                                <tr>


                                </tr>



                            </thead>
                        </table>
                    </center>
                    

                    <center>
                        <dev class="button">
                            <input type="submit" value="Return Book">
                        </dev>
                    </center>
                    <style>

                        .button input{
                            padding:10px;
                            border-color: #ffff00;
                            margin: 1em;
                            background-color: #ffff00; 
                            border-radius: 50%;
                        }

                    </style>
                    <style>

                        .table3 table{
                            width:70%;
                            text-align: center;
                            background-color:yellow;
                            padding:20px;



                        }

                    </style> 


                </dev>
            </dev>    
        </form>

        <?php
        if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){
        ?>    
        
        <br>
        <h1><center><u>Transection Details</u>
        <br>
        </center></h1>
         <dev class="s">
            <dev class="srch">
        <br>
               
                <input type="button" value="Search" id="searchbtn">
            </dev>
            <dev class="sr">
                <input type="search" placeholder="Enter Member ID" id="searchbox">
                
            </dev>
            <br><br>
        </dev>
       
        <script>
            var srcbtn=document.getElementById('searchbtn');
            srcbtn.addEventListener('click', searchprocess);

            function searchprocess(){
                var searchval=document.getElementById('searchbox').value;
                window.location.assign("admintransectionsearch.php?param1="+searchval);
            }


        </script>
        <dev class="table1">
            <br>
            <dev class="table2">
                <table>
                    <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Book ID</th>
                           
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Return Date</th>
                            <th>Fine</th>

                        </tr>



                    <tbody>
                        <?php
            try{

                $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sqlquery="SELECT Mem_ID,Book_ID,Issue_date,Due_date,Return_date,Fine FROM borrow";

                try{
                    $returnval=$dbcon->query($sqlquery);

                    $custtable=$returnval->fetchAll();

                    foreach($custtable as $row){
                        ?>

                        <tr>
                            <td><?php echo $row['Mem_ID'] ?></td>   
                            <td><?php echo $row['Book_ID'] ?></td>   <td><?php echo $row['Issue_date'] ?></td>   
                            <td><?php echo $row['Due_date'] ?></td> 

                            <td><?php echo $row['Return_date'] ?></td>   
                            <td><?php echo $row['Fine'] ?></td> 											
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