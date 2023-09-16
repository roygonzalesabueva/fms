




<?php include 'fileslogic.php';?>





<?php

 
	session_start();
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 include('./header.php'); 
 // include('./auth.php'); 
 ?>




<!DOCTYPE html>
<html>  
    <head>
        <title>PHP</title>
        <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="indexdown.php" method="post" enctype="multipart/form-data">
             <!--   <h3>Upload Files </h3>
                    <input type="file" name="myfile"><br>
                    <button type="submit" name="save">Upload</button>-->

        </form>

        </div>



<!--  Downlod-->


        <div class="row">

            <table>
                <thead>
                    <th>id</th>
                    <th>name</th>
                    
                    




                    <th>date_updated</th>
                   
                     <th>Action</th>

                </thead>

                <tbody>
                    <?php foreach ($files as $row): ?>

                    <tr> 

                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['name'];?></td>
                       
                         

                         <td><?php echo $row['date_updated'];?></td>
                       



                        <td>
                            <a href="indexdown.php?file_id=<?php echo $row['id']?>">DOWNLOAD </a>
                        </td>
                    </tr>

                <?php endforeach ; ?>

                </tbody>

            </table>


        </div>


<!--  end Downlod-->






     </div>
 </body>
</html>