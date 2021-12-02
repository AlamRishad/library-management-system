<?php

if(isset($_POST['s5']) && isset($_POST['s6']) && isset($_POST['s7']) &&
   isset($_POST['s8'])&&
   !empty($_POST['s5']) && !empty($_POST['s6']) && !empty($_POST['s7']) &&
   !empty($_POST['s8'])){
    /// to establish a connection with database server

    $var1=$_POST['s5'];
    $var2=$_POST['s6'];
    $var3=($_POST['s7']); /// using encoded password
    $var4=($_POST['s8']);


    try{

        $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query="UPDATE borrow
       SET Return_date = '$var3',
       Fine = '$var4'
       WHERE Mem_ID='$var1' and Book_ID='$var2'";



        try{
            /// to insert data to corresponding database
            $dbcon->exec($query);
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