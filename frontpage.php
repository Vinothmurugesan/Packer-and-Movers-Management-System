<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>V PACK</title>
<style>

.w3-white{
  background-image: url(bioimg.jpg); 
    background-repeat: no-repeat; 
    background-position:cover; 
    background-size: cover; 
}

.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.image-container {
  text-align: center;
  width: 100%;
}

.links-container {
  display: flex;
  flex-direction: column;
  jusify-content: center;
  align-items: center;
}

.link {
  min-width: 50% !important;
}

@media (min-width: 1200px) .container {
  max-width: 1140px;
}
@media (min-width: 992px) .container {
  max-width: 960px;
}
@media (min-width: 768px) {
.container {
    max-width: 720px;
  }

.link {
    width: 100%;
  }
}
@media (min-width: 576px) {
.container {
    max-width: 540px;
  }
}

.w3-purple, .w3-hover-purple:hover {
color: #fff!important;
background-color: rgba(15, 39, 176, 0.6) !important;
}
</style>
  </head>


  <body class="w3-white">
    <!-- Content container -->
    <div class="container">

      <!-- Image and name container. Change to your picture here. -->
    <div class="image-container">
    <img src="logo.jpg" class="w3-margin" alt="Photo by Art Hauntington" max-width="100%" height="150px" style="border-radius: 50%; alt=">
     <div class="w3-text-white">
     <p class="w3-text-white w3-large">V PACK</p>
      </div>

    <!-- Links section 1. Replace the # inside of the "" with your links. -->
    <div class="links-container">
      <a href="listusers.php" class="w3-button w3-hover-blue w3-large w3-round w3-purple w3-border link"><i class="fab fa-code"> </i>List User</a>
      <br>
      <a href="staff_index.php" class="w3-button w3-hover-blue w3-large w3-round w3-purple w3-border link"><i class="fa fa-code"> </i>Staff Details</a>
      <br>
      <a href="job_index.php" class="w3-button w3-hover-blue w3-large w3-round w3-purple w3-border link"><i class="fa fa-code"> </i>Job Details</a>
      <br>
      <a href="assignjobs.php" class="w3-button w3-hover-blue w3-large w3-round w3-purple w3-border link"><i class="fa fa-code"> </i>Assign Jobs</a>
      <br>
      <a href="report.php" class="w3-button w3-hover-blue w3-large w3-round w3-purple w3-border link"><i class="fa fa-code"> </i>Reports</a>
      <br>
      <a href="logout.php" class="w3-button w3-hover-blue w3-large w3-round w3-purple w3-border link"><i class="fa fa-code"> </i>Logout</a>
    </div>
  </div>
</div>

  </body>  
</html>
