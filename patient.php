<!DOCTYPE html>
<html lang="en">
<head>
  <title>iCare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1 class="display-1 text-justify text-danger">iCare </h1>
  <h1 class="display-4 text-left">Sign Up </h1>
<form>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Last Name</label>
      <input type="email" class="form-control" id="inputEmail4" required="required">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Other Name(s)</label>
      <input type="password" class="form-control" id="inputPassword4" required="required">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" required="required">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" required="required">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
  <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Male
  </label>
</div>
 </div>
  <div class="form-group col-md-2">
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
    Female
  </label>
</div>
</div>
<div class="form-group col-md-8"></div>
</div>
<div class="form-row">
   <div class="form-group col-md-2">
      <label for="inputEmail4">Date of Birth: </label>
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Day</label>
      <input type="email" class="form-control" id="inputEmail4" required="required">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Month</label>
      <input type="password" class="form-control" id="inputPassword4" required="required">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Year</label>
      <input type="password" class="form-control" id="inputPassword4" required="required">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Height (cm)</label>
      <input type="email" class="form-control" id="inputEmail4" required="required">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Weight (lb)</label>
      <input type="password" class="form-control" id="inputPassword4" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required="required">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" required="required">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" required="required">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" required="required">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>

</div>

</body>
</html>
