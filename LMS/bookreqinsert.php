<?php
    

    if(isset($_POST['bname']) && isset($_POST['aname']) && isset($_POST['btype']) &&
   
       !empty($_POST['bname']) && !empty($_POST['aname']) && !empty($_POST['btype'])) 
    {
        $var1=$_POST['bname'];
        $var2=$_POST['aname'];
        $var3=$_POST['btype'];
       
        
        try{
            
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="INSERT INTO new_books VALUES('$var1','$var2','$var3')";  /// insecure
            
            try{
                /// to insert data to corresponding database
                $dbcon->exec($query);
                
                /// if successful, forward the user to the login page
                ?>
             <script>window.location.assign('BookReq.php')</script>
                <?php
            }
            catch(PDOException $ex){
                /// if not successful, return back to sign up page
                ?>
                    <script>window.location.assign('BookReq.php')</script>
                     <p>Something Wrong</p>
                <?php
            }
            
        }
        catch(PDOException $ex){
            ?>
               <script>window.location.assign('BookReq.php')</script>
                     <p>Something Wrong</p>
            <?php
        }
    }
    else{
          ?>
           <script>window.location.assign('BookReq.php')</script>
         <?php
        
    }
?>