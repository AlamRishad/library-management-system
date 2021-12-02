<?php

if(isset($_POST['s1']) && isset($_POST['s2']) && isset($_POST['s3']) &&
   isset($_POST['s4'])&&
   !empty($_POST['s1']) && !empty($_POST['s2']) && !empty($_POST['s3']) &&
   !empty($_POST['s4'])){
    /// to establish a connection with database server

    $var1=$_POST['s1'];
    $var2=$_POST['s2'];
    $var3=($_POST['s3']); /// using encoded password
    $var4=($_POST['s4']);


    try{
        ///php-mysql 3 way. We will use PDO - PHP data object
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id = $dbcon->prepare("SELECT Mem_Id FROM member where Mem_Id = '$var1'");
        $name = $dbcon->prepare("SELECT Book_ID FROM book where Book_ID = '$var2'");
            
        $query="INSERT INTO borrow VALUES('$var3','pending','$var4','0','$var2','$var1')";  





        try{
            $id->execute();
            $name->execute();
            $count1=(int)$id->fetchColumn();
            $count2=(int)$name->fetchColumn();
            
            /// to insert data to corresponding database
            if($count1){
                if($count2){
                    $dbcon->exec($query);
                }
                else{
                ?>
<script>
    window.location.assign('invalidadminborrow.php')</script>
<?php
            }
            }
            else{
                ?>
<script>
    window.location.assign('invalidadminborrow.php')</script>
<?php
            }
            /// if successful, forward the user to the login page
?>
<script>
    window.location.assign('admintransection.php')</script>
<?php
        }
        catch(PDOException $ex){
            /// if not successful, return back to sign up page
?>
<script>window.location.assign('admintransection.php')</script>
<?php
        }

    }
    catch(PDOException $ex){
?>
<script>window.location.assign('admintransection.php')</script>
<?php
    }
}
else{
?>
<script>window.location.assign('admintransection.php')</script>

<?php

}
?>