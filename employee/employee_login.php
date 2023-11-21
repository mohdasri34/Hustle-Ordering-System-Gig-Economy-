<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['employee_id'])){
   $employee_id = $_SESSION['employee_id'];
}else{
   $employee_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_employee = $conn->prepare("SELECT * FROM `employee` WHERE email = ? AND password = ?");
   $select_employee->execute([$email, $pass]);
   $row = $select_employee->fetch(PDO::FETCH_ASSOC);

   if($select_employee->rowCount() > 0){
      $_SESSION['employee_id'] = $row['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
   
<?php include '../components/employee_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" class="btn" name="submit">
      <a href="register_employee.php" class="option-btn">register now</a>
   </form>

</section>













<?php include '../components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>