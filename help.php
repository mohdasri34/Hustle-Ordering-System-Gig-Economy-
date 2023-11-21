<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>help</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="content">
         <h3>Introduction</h3>
         <p>Hustle, also known as the freelance or on-demand economy, represents a fundamental shift in the way people work and the nature of jobs. Unlike traditional full-time jobs, the gig economy thrives on short-term, flexible and project-based work arrangements.</p>
      </div>

      <div class="content">
         <h3>Getting Started</h3>
         <p>Before diving into the gig economy, take the time to assess your skills, strengths, and areas of expertise. Identify what you're passionate about and what services you can offer. This self-reflection will guide you in selecting gigs that align with your abilities.</p>
      </div>

      <div class="content">
         <h3>Cybersecurity and Data Privacy</h3>
         <p>Ensuring cybersecurity and maintaining data privacy are critical aspects of working in the gig economy, especially as many gigs involve the use of digital platforms and online communication. </p>
      </div>

      <div class="content">
         <h3>Safety Precautions </h3>
         <p>Before accepting a gig, research and verify the legitimacy of the client or employer. Check reviews, ratings, and testimonials on gig platforms to ensure they have a positive reputation.</p>
      </div>

   </div>

</section>


<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>