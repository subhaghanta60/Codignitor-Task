
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  
  <h1>Employee Details</h1>
  <p>In this Employee WebPage , You see all Your  Employee details along with that you can add and also delete Employee Details </p>  
  <div class="container" style="padding-top: 10px;">
    <div class ="col-md-12">
      <?php
         $success = $this->session->userdata('success');
         if($success != ""){
          ?>
          
          <div class ="alert alert-success"> <?php echo $success ;?>  </div>
          <?php

         }
         ?>

      <?php
         $failure = $this->session->userdata('failure');
         if($failure != ""){
          ?>
          
          <div class ="alert alert-success"> <?php echo $failure ;?>  </div>
          <?php

         }
        ?>


    </div>

</div>
  
  <table class="table">
    <thead>
      <tr>
        <th>Empno</th>
        <th>EmpImage</th>
        <th>Ename</th>
        <th>Phoneno</th>
        <th>Email</th>
        <th>Mgr</th>
        <th>Salary</th>
      
        <th>Designation</th>
        <th>Edit</th>
        <th>Delete</th>

      </tr>
    </thead>
    <tbody>

      <tr>
        <?php foreach($Employee as $emp): ?>
        <td><?php  echo $emp['Empno'] ; ?></td>
        <?php 
        
        
        
        ?>
        <?php if (!is_null($emp['image_path'])){ ?>
          <td><img src="<?php echo $emp['image_path'] ?>" alt="Photo"></td>   
         <?php } ?>



        <td><?php  echo $emp['Ename'] ; ?></td>
        <td><?php  echo $emp['Phone'] ; ?></td>
        <td><?php  echo $emp['Email'] ; ?></td>

        <td><?php  echo $emp['Mgr'] ; ?></td>

        <td><?php  echo $emp['Salary'] ; ?></td>

      

        <td><?php  echo $emp['Designation'] ; ?></td>
        <td>
          <a href=" <?php echo base_url().'index.php/Employes/edit/'.$emp['Empno'] ?>" class="btn btn-primary"> Edit</a>
        </td>
        <td>
          <a href= "<?php echo base_url().'index.php/Employes/delete/'.$emp['Empno'] ?> " class="btn btn-danger">Delete </a>
        </td> 


     </tr>
     <?php endforeach ; ?>
      
    </tbody>
  </table>
   <hr>
  <div class="col-6">
    <h3>To Add Employee Details</h3>
    <a href="<?php echo base_url().'index.php/Employes/create' ?> " class= "btn btn-primary" > Create </a>
  </div>

 

  
  <h3> To Create Employee Data through Csv file</h3>
  <div  id="importFrm" >
            <form action="<?php echo base_url('index.php/Members/import'); ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT" />
            </form>
        </div>
    
   

  

  
  <div class="col-6">
    <h3> To Download All Employee Data</h3>
    <a href="<?php echo base_url().'index.php/Employes/export' ?> " class= "btn btn-primary" > Export </a>

  </div>

  <div class="col-6">
    <h3> To Logout Your Account</h3>
    <a href="<?php echo base_url().'index.php/Employes/Logout' ?> " class= "btn btn-primary" > Logout </a>

  </div>

 
  
</div>


</body>
</html>

