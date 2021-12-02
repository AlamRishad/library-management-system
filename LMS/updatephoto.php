<?php
    session_start();
    if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){

      
            if(isset($_FILES['dimage'])){
                $var4=$_FILES['dimage'];
                  $mail= $_SESSION['useremail'];
                move_uploaded_file($var4['tmp_name'],"memberImages/$mail.jpg");
            }


            try{
               

                $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
                $sqlquery="UPDATE member SET image='memberImages/$mail.jpg' WHERE Email='$mail'";

              

                try{
                    $dbcon->exec($sqlquery);
                   ?>
                        <script>
                            window.location.assign('MyProfile.php');
                        </script>
                    <?php
                  
                }
                catch(PDOException $ex){
                    ?>
                        <script>
                            window.location.assign('homepage.php');
                        </script>
                    <?php
                }

            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('MyProfile.php');
                    </script>
                <?php
            }
        
       
    }
    else{
        ?>
            <script>
                window.location.assign('homepage.php');
            </script>
        <?php
    }
?>