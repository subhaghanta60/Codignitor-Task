
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Employee Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2> Update Employee Details</h2>
  <form method ="post" name ="UpdateEmployeeData"  class="was-validated" action=" <?php echo base_url().'index.php/Employes/edit/'.$Employee['Empno']; ?>" enctype="multipart/form-data" required>
    <div class="row" >
      <div class="col-lg-6">
    <div class="mb-3 mt-3">
      <label for="text">Employee Name</label>
      <input type="text" class="form-control" id="Ename" placeholder="Enter Employee Name" name="Ename" value="<?php echo set_value('Ename', $Employee['Ename']); ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      <?php echo form_error('Ename') ; ?>
    </div>
    <div class="mb-3 mt-3">
      <label for="number">Employe Phone Number</label>
      <input type="number" class="form-control" id="Phone" placeholder="Enter Employee Phone no" name="Phone" value="<?php echo set_value('Phone',  $Employee['Phone']); ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      <?php echo form_error('Phone') ; ?>
  
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Employee Email Id</label>
      <input type="email" class="form-control" id="Email" placeholder="Enter Employee Email Id" name="Email" value="<?php echo set_value('Email',  $Employee['Email']); ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      <?php echo form_error('Email') ; ?>
    </div>
    <div class="mb-3 mt-3">
      <label for="number">Employee Manager No</label>
      <input type="number" class="form-control" id="Mgr" placeholder="Enter Employe Manager No" name="Mgr"  value="<?php echo set_value('Mgr',  $Employee['Mgr']); ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      <?php echo form_error('Mgr') ; ?>
    </div>
    <div class="mb-3 mt-3">
      <label for="number">Employee Salary</label>
      <input type="number" class="form-control" id="Salary" placeholder="Enter Employee Salary" name="Salary"  value="<?php echo set_value('Salary',  $Employee['Salary']); ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      <?php echo form_error('Salary') ; ?>
    </div>
   

    <div class="mb-3">
      <label for="text">Designation</label>
      <input type="text" class="form-control" id="Designation" placeholder="Enter Employee Designation" name="Designation" value="<?php echo set_value('Designation', $Employee['Designation']); ?>" required > 
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      <?php echo form_error('Designation') ; ?>
    </div>
</div>
</div>
<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label for="body">Select Image</label>

      <?php echo form_upload(['name'=>'userfile']); ?>
</div>
</div>
<div class="col-lg-6" style="margin-top:40px;">
<?php if(isset($upload_error)) { echo $upload_error; } ?>
</div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href=" <?php echo base_url().'index.php/Employes/Employe' ?> " class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
