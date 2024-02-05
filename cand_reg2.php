<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">

    <title>Boy_Candidate_Reg</title>
</head>
<body>
    <nav>
        <div class="navbar">
          <ul>
            <li><a href="#">
              <i class="fas fa-home"></i>
              <span class="nav-item" style="color:white;">Home</span>
            </a></li>
            <li><a href="#">
              <i class="fas fa-user"></i>
              <span class="nav-item" style="color:white;">Profile</span>
            </a></li>
            <li><a href="#" class="Users">
                <i class="fas fa-address-card"></i>
                <span class="nav-item" style="color:white;">Users</span>
            </a></li>
    
            <li><a href="#" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item" style="color:white;">Log out</span>
            </a></li>
            
          </ul>
        </div>
        
    </nav>
    <section>
        <h1 style="padding-left: 20%;padding-bottom: 2%;font-size: 50px;color:#1e4f81;font-family: 'Nunito Sans', sans-serif;">Candidates Registration</h1>
        <!-- <h2  style="padding-left: 20%;padding-bottom: 2%;font-size: 30px;color:#1e4f81;font-family: 'Nunito Sans', sans-serif;">Boy Catogory</h2> -->
        <form class="choice" method="post" action="">
        <?php
            if(isset($_SESSION['status'])){
                // echo "<h4>".$_SESSION['status']."</h4>";
                unset($_SESSION['status']);
            }
            ?>
          <table align="center" style="width:75%;">
            <tr>
              <td align="center">
                  <label for="Elections" style="font-size: 20px; padding-right: 20px;">Name of Elections:</label>
                  <select name="Elections" id="E1">
                      <option value="CR Elections">CR Elections</option>
                      <option value="BR Elections">BR Elections</option>
                  </select><br><br>

                  <label for="catogaries" style="font-size: 20px; padding-right: 20px;">Name of Catogory:</label>
                  <select name="Catogory" id="E2">
                      <option value="Boy Catogory">Boy Catogory</option>
                      <option value="Girl Catogory">Girl Catogory</option>
                      <option value="BR Catogory">BR Catogory</option>
                  </select><br><br>
                  <label for="C1" style="font-size: 20px; padding-right: 20px;">Name:</label>
                  <input style=" position:relative; padding-left: 100px;" type="text" id="C1" name="Name" value=""><br><br>
                  
                  <label for="C1" style="font-size: 20px; padding-right: 20px;">Roll_no:</label>
                  <input style=" position:relative; padding-left: 100px;" type="text" id="C1" name="Roll_no" value=""><br><br>
                  
                  <label for="C1" style="font-size: 20px; padding-right: 20px;">Email_id:</label>
                  <input style=" position:relative; padding-left: 100px;" type="text" id="C1" name="Email_id" value=""><br><br>
                  
                  
                  <label for="Batch" style="font-size: 20px; padding-right: 20px;">Batch:</label>
                  <select name="Batch" id="E2">
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                  </select><br><br>
                  <!-- <input style=" position:relative; padding-left: 100px;" type="text" id="C1" name="Batch" value=""><br><br> -->
                  
                  <label for="C1" style="font-size: 20px; padding-right: 20px;">Department:</label>
                  <input style=" position:relative; padding-left: 100px;" type="text" id="C1" name="Department" value=""><br><br>
                  <label for="C1" style="font-size: 20px; padding-right: 20px;">Manifesto:</label>
                  <input type="file" name="upload" accept="application/pdf,application/vnd.ms-excel" style=" position:relative; padding-left: 100px;" />
                <!-- <button ><a href="#" style="color:white; font-size: 30px;">Boy Catogary</a></button><br>
                <button ><a href="#" style="color:white; font-size: 30px;">Girl Catogary</a></button><br> -->
              </td>
            </tr>
          </table>
          <button class="sub_but" type="submit" name="save_opt"  style=" border-radius: 10px; border-left: 50px;padding-left:100px;margin-left: 446px;padding-right:100px"><b>submit</b></button>
        </form>       
        
        
      </section>
      <?php
$con= mysqli_connect("localhost","root","","vms");
if($con!=true){
    echo "connection failed";
}
else{
    echo "connected successfully";
}

if(isset($_POST['save_opt'])&&isset($_POST['Elections'])&&isset($_POST['Catogory'])&&isset($_POST['Name'])&&isset($_POST['Roll_no'])&&isset($_POST['Email_id'])&&isset($_POST['Batch'])&&isset($_POST['Department'])&&isset($_POST['upload'])){
    echo "ttt";
    $Elections=$_POST['Elections'];
    $Catogory=$_POST['Catogory'];
    $Name=$_POST['Name'];
    $Roll_no=$_POST['Roll_no'];
    $Email_id=$_POST['Email_id'];
    $Batch=$_POST['Batch'];
    $dept=$_POST['Department'];
    $Manifesto=$_POST['upload'];


    $query = " INSERT INTO candidate_database (roll_no, name,email_id,batch,department,elections ,catogory,manifesto) VALUES ('$Roll_no','$Name','$Email_id','$Batch','$dept','$Elections','$Catogory','$Manifesto'); " ;
    $query_run= mysqli_query($con,$query);

    if($query_run){
        $_SESSION['status'] ="Inserted Succesfully";
        echo $_SESSION['status'];
        // header("location: success.html");
    }
    else{
        $_SESSION['status'] =" Not Inserted Succesfully";
        // header("location: fail.html");
        echo $_SESSION['status'];

    }
}
else{
  echo "Fill the Form completely";
}


?>



    
</body>
</html>