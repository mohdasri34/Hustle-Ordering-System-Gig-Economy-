<?php

include '../components/connect.php';

session_start();

$employee_id = $_SESSION['employee_id'];

if(!isset($employee_id)){
   header('location:employee_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_employee = $conn->prepare("DELETE FROM `employee` WHERE id = ?");
   $delete_employee->execute([$delete_id]);
   header('location:employee_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>employee accounts</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/employee_header.php'; ?>

<section class="accounts">

   <h1 class="heading">employee accounts</h1>

   <div class="box-container">

   <div class="box">
      <p>add new employee</p>
      <a href="register_employee.php" class="option-btn">register employee</a>
   </div>

   <?php
      $select_accounts = $conn->prepare("SELECT * FROM `employee`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>
   <div class="box">
      <p> employee id : <span><?= $fetch_accounts['id']; ?></span> </p>
      <p> employee name : <span><?= $fetch_accounts['name']; ?></span> </p>
      <div class="flex-btn">
      <a href="employee_accounts.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('delete this account?')" class="delete-btn">delete</a>
         <?php
            if($fetch_accounts['id'] == $employee_id){
               echo '<a href="update_profile.php" class="option-btn">update</a>';
            }
         ?>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no accounts available!</p>';
      }
   ?>

   </div>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>