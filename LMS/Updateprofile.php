<!DOCTYPE html> <!-- html comment: html version 5 -->

    


    <?php
         

    if(isset($_POST['uemail']) && isset($_POST['nemail']) && !empty($_POST['uemail']) && !empty($_POST['nemail'])  ){
        
        
        $var1=$_POST['uemail'];      
        $var2=$_POST['nemail'];
        
        try{
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="UPDATE member
                    SET Email='$var2'
                    WHERE Email='$var1'";
            
            try{
                
                $dbcon->exec($query);
                
                ?>
                    <script>window.location.assign('loginpage.php')</script>
                <?php
            }
            catch(PDOException $ex){
               
                ?>
                    <script>window.location.assign('MyProfile.php')</script>
                <?php
            }
            
        }
        catch(PDOException $ex){
            ?>
                <script>window.location.assign('MyProfile.php')</script>
            <?php
        }
    }
          
    if(isset($_POST['upass']) && isset($_POST['npass']) && !empty($_POST['upass']) && !empty($_POST['npass'])){
        
        
        $var1=md5($_POST['upass']);      		
        $var2=md5($_POST['npass']);
        try{
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="UPDATE member
                    SET Mem_pass='$var2'
                    WHERE Mem_pass='$var1'";
            
            try{
              
                $dbcon->exec($query);
                
                ?>
                    <script>window.location.assign('loginpage.php')</script>
                <?php
            }
            catch(PDOException $ex){
               
                ?>
                    <script>window.location.assign('MyProfile.php')</script>
                <?php
            }
            
        }
        catch(PDOException $ex){
            ?>
                <script>window.location.assign('MyProfile.php')</script>
            <?php
        }
    }
    else{
        ?>
            <script>window.location.assign('MyProfile.php')</script>
    
        <?php
        
    }
         
                
?>
            
      

   


