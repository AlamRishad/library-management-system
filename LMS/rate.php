<?php
if(isset($_POST['bid']) &&   !empty($_POST['bid']) && isset($_POST['rate']) &&   !empty($_POST['rate'])){
    session_start();

    $var1=$_SESSION['useremail'];
    $var2=$_POST['bid'];  
    $var3=$_POST['rate']; 
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id =("SELECT Mem_Id FROM member where Email = '$var1'");

        try{
            $id1=$dbcon->query($id);
            $id2 =$id1->fetchColumn();
            
            $q=("SELECT Rates From can_rates WHERE Book_ID ='$var2' AND Mem_Id='$id2'");
           
            $q1=$dbcon->query($q);
            $q2 =$q1->fetchColumn();
            
            if($q2>0){
               ?>
                <script>window.location.assign('invalidbookmember.php')</script>
            <?php
                
            }
            else{

             
                  $query="INSERT INTO can_rates VALUES('$var3','$var2','$id2')";
                  $dbcon->query($query);
                $count=("SELECT COUNT(Rates) FROM can_rates WHERE Book_ID='$var2'");
                 $ct1=$dbcon->query($count);
                 $ct2 =$ct1->fetchColumn();
                 $sum=("SELECT SUM(Rates) FROM can_rates WHERE Book_ID='$var2'");
                 $sm1=$dbcon->query($sum);
                 $sm2 =$sm1->fetchColumn();
                 $sm2/=$ct2;
                 $up=("UPDATE book
                     SET Rating='$sm2'
                    WHERE Book_ID='$var2'");
             $dbcon->query($up);
                  ?>
      <script>window.location.assign('bookMember.php')</script>
      <?php
        }
            }   
        

        catch(PDOException $ex){
       ?>
      <script>window.location.assign('homepage.php')</script>
      <?php
        }

    }
 catch(PDOException $ex){
?>
<script>window.location.assign('homepage.php')</script>
<?php
    }
   
}
else{
     ?>
<script>window.location.assign('homepage.php')</script>
<?php
}
?>