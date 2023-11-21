<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="../employee/dashboard.php" class="logo">Employee<span>Panel</span></a>

      <nav class="navbar">
         <a href="../employee/dashboard.php">Home</a>
         <a href="../employee/products.php">Talent</a>
         <a href="../employee/placed_orders.php">Orders</a>
         <a href="../employee/employee_accounts.php">Employee</a>
         <a href="../employee/users_accounts.php">Users</a>
         <a href="../employee/messages.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `employee` WHERE id = ?");
            $select_profile->execute([$employee_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <p><?= $fetch_profile["name"]; ?></p>
            <a href="../employee/update_profile.php" class="btn">update profile</a>
            <div class="flex-btn">
            <a href="../components/employee_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
            </div>
            <?php
               }else{
            ?>
            <p>please login or register first!</p>
            <div class="flex-btn">
               <a href="../employee/register_employee.php" class="option-btn">register</a>
               <a href="../employee/employee_login.php" class="option-btn">login</a>
            </div>
            <?php
               }
            ?>      

   </section>

</header>