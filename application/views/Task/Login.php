<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Login Your Account</h2>
  <?php
         $failure = $this->session->userdata('failure');
         if($failure != ""){
          ?>
          
          <div class ="alert alert-danger"> <?php echo $failure ;?>  </div>
          <?php

         }
        ?>
         
  <form method ="post" name ="CreateEmployeeData" class="was-validated" action=" <?php echo base_url().'index.php/Employes/process'; ?>">
  <div class="row">
  <div class="col-lg-6" >  
  <div class="mb-3 mt-3">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="Email" placeholder="Enter Your Email Id" name="Email" value="<?php echo set_value('Email'); ?> "   required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      
    </div>
    <div class="mb-3 mt-3">
      <label for="text">Password</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter  Your Password" name="pwd" value="<?php echo set_value('pwd'); ?>"  required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    
    </div>
        </div>
        </div>
   
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href=" <?php echo base_url().'index.php/Employes/Welcome' ?> " class="btn btn-secondary">Cancel</a>
  </form>
</div>

</body>
</html>

