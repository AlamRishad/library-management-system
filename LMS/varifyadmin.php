<?php
    

    if(isset($_POST['uemail']) && isset($_POST['upass']) 
       && !empty($_POST['uemail']) && !empty($_POST['upass'])){
        /// data receive
        /// database check email, password
        /// yes, forward homepage
        /// no, forward loginpage
        
        $var1=$_POST['uemail'];
        $var2=md5($_POST['upass']);
        
        try{
            ///php-mysql 3 way. We will use PDO - PHP data object
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sqlquery="SELECT * FROM admin WHERE admin_email='$var1' and admin_pass='$var2'";
            
            try{
                $returnval=$dbcon->query($sqlquery);
                if($returnval->rowCount()==1){
                    ///one valid user found
                    session_start();
                    
                    $_SESSION['useremail']=$var1;
                    ?>
                       
                        <script>
                            window.location.assign('homepageadmin.php');
                        </script>
                    <?php
                }
                else{
                    ///invalid user
                    ?>
                        <script>
                            window.location.assign('invalidloginadmin.php');
                        </script>
                    <?php
                }
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('invalidloginadmin.php');
                    </script>
                <?php
            }
        }
        catch(PDOException $ex){
            ?>
                <script>
                    window.location.assign('invalidloginadmin.php');
                </script>
            <?php
        }
        
    }
    else{
        ?>
            <script>
                window.location.assign('invalidloginadmin.php');
            </script>
        <?php
    }
?>