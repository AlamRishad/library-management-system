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
      


        <dev class="table1">
            <dev class="table2">
                <table>
                    <thead>
                       
                        <tr>
                            <th>Member ID</th>
                            <th>Book ID</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Due Date</th>
                             <th>Fine</th>

                        </tr>
                      
                    </thead>

                    <tbody>
                        <?php
                        $var1=$_SESSION['useremail'];
                        
                        try{
                             
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $id =("SELECT Mem_Id FROM member where Email = '$var1'");
                             
                            try{
                                 $id1=$dbcon->query($id);
                                 $id2 =$id1->fetchColumn();
                                
                                if($id2!=null){
                              $sqlquery=("SELECT * FROM borrow WHERE Mem_ID = '$id2'");
                                
                                 $returnval=$dbcon->query($sqlquery);
                                 $custtable=$returnval->fetchAll();

                                foreach($custtable as $row){
                        ?>

                        <tr>
                            <td><?php echo $row['Mem_ID'] ?></td>   
                            <td><?php echo $row['Book_ID'] ?></td>   
                            <td><?php echo $row['Issue_date'] ?></td>   
                            <td><?php echo $row['Return_date'] ?></td> 
                            <td><?php echo $row['Due_date'] ?></td>  
                            <td><?php echo $row['Fine'] ?>    </td>  
                        </tr>
                        <?php
                                }
                            }
                                else
                                {
                                     ?>
                                   <script>window.location.assign('homepage.php')</script>
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

            </dev>
        </dev>                

                        </body>
                            </html>

