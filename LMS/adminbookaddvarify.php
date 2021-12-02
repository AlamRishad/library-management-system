<?php
    /// received data collect

    // to receive the post data we need to call $_POST variable
    // $_POST represents an associative array

    if(isset($_POST['bID']) && isset($_POST['bname']) && isset($_POST['bISBN']) &&
    isset($_POST['bavailable'])&&
    isset($_POST['btype']) &&
    isset($_POST['bauthor']) &&
       !empty($_POST['bID']) && !empty($_POST['bname']) && !empty($_POST['bISBN']) &&
       !empty($_POST['bavailable']) &&
       !empty($_POST['btype']) &&
       !empty($_POST['bauthor'])){
        /// to establish a connection with database server
        
        $var1=$_POST['bID'];
        $var2=$_POST['bname'];
        $var3=($_POST['bISBN']); /// using encoded password
        $var4=$_POST['bavailable'];
        $var5=$_POST['btype'];
        $var6=$_POST['bauthor'];
        
        
        try{
            ///php-mysql 3 way. We will use PDO - PHP data object
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="INSERT INTO book VALUES('$var2','$var1','$var4','0','1','$var3','$var5','$var6')";
            $query1="Delete FROM new_books where Book_Name = '$var2' AND Author='$var6' AND Book_Type = '$var5'" ;
            
            /// insecure
      
            try{
                /// to insert data to corresponding database
                $dbcon->exec($query);
                
                /// if successful, forward the user to the login page
                ?>
                    <script>window.location.assign('bookadmin.php')</script>
                <?php
            }
            catch(PDOException $ex){
                /// if not successful, return back to sign up page
                ?>
                    <script>window.location.assign('bookadd.php')</script>
                <?php
            }
            
        }
        catch(PDOException $ex){
            ?>
                <script>window.location.assign('bookadd.php')</script>
            <?php
        }
    }
    else{
        ?>
            <script>window.location.assign('bookadd.php')</script>
    
        <?php
        
    }
?>