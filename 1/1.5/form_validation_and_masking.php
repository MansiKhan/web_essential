<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation and Masking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <style>
        body {
	        margin: 0;
	        background-color: #ecfab6;
        }

        .alert{
            display: none;
        }
    </style>
</head>
<body>

<div class="container py-3">
    <div class="row">
      <div class="col-md-12"> 
          
        <h2 class="text-center mb-3">Form Validation And Masking</h2>
				
        <hr class="mb-4">
        <div class="row justify-content-center">
          <div class="col-md-6">
						
            <div class="card card-outline-secondary">
              <div class="card-header">
                <h3 class="mb-0">Form</h3>
              </div>
              <div class="card-body">
                  <div class="alert alert-danger">Not Submitted!</div>
                  <div class="alert alert-success">Submitted Successfully!</div>
                <form class="form" id="form" name="form" role="form" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="text">Text</label> 
					<input type="text" class="form-control" id="text"  name="text" minlength="1" maxlength="60" required>
                  </div>
                  <div class="form-group">
                    <label>Number</label> 
					<input type="number"  class="form-control" id="number" name="number" min="0" max="999" step="0.1" required>
                </div>
                <div class="form-group">
                    <label>Date</label> 
					<input type="date"  class="form-control" id="date" name="date" max="<?php echo date("Y-m-d");?>" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label> 
					<input type="email"  class="form-control" id="email" name="email" required>
                  </div>
                  <div class="form-group">
                    <label>Tel Number</label> 
					<input type="tel"  class="form-control" id="tel" name="tel"  placeholder="+92345-1926880" pattern="\+[0-9]{5}-[0-9]{7}" required>
                  </div>
                  <div class="form-group">
                    <label>Cnic</label> 
					<input type="text"  class="form-control" id="cnic" name="cnic" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" placeholder="13209-7401123-4" required>
                  </div>
                  <div class="form-group">
                    <label>File</label> 
					<input type="file"  class="form-control" id="file" name="file" accept="image/*" required>
                  </div>
                    <input type="hidden" name="form1">
                    <input type="submit" class="btn btn-success btn-lg float-right" name="submit" value="submit">
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>

    function hideAlert() {
        $(".alert").css("display","none");
    }

    $("input[name='cnic']").keyup(function () {
        $value = $(this).val();

        if ($value.length == 5 || $value.length == 13) {
            $value += "-";
            $(this).val($value);
        }
    });

    $("#form").submit(function (e) {
        
        var alert = false;
        $text = $("#form input[name=text]");
        $number = $("#form input[name=number]");
        $date = $("#form input[name=date]");
        $dateFormat = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
        $email = $("#form input[name=email]");
        $emailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        $tel = $("#form input[name=tel]");
        $telFormat = /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
        $cnic = $("#form input[name=cnic]");
        $cnicFormat = /^[1-4]{1}[0-9]{4}(-)?[0-9]{7}(-)?[0-9]{1}$/;
        $file = $("#form input[name=file]");
        $fileDetailArray = $file.val().split('.');
        $lastElement = $fileDetailArray[1];
        var imageFormats = ["JPG", "GIF", "JPEG","PNG"];

        if ($text.val() == "") {
            $(".alert-danger").text("Text Field Must Be filled.");
            alert = true;
        }

        else if ($text.val().length > 60) {
            $(".alert-danger").text("TextMust be less than or equal to 60.");
            alert = true;
        }

        else if ($number.val() == "") {
            $(".alert-danger").text("Number Field Must Be filled.");
            alert = true;
        }

        else if (isNaN(Number($number.val()))) {
            $(".alert-danger").text("Number Only.");
            alert = true;
        }

        else if (Number($number.val() < 0) ) {
            $(".alert-danger").text("Only Positive Numbers.");
            alert = true;
        }

        else if (Number($number.val() > 999) ) {
            $(".alert-danger").text("Number must be Less than or Eqal to 999.");
            alert = true;
        }
        
        else if ($date.val() == "") {
            $(".alert-danger").text("Date Field Must Be filled.");
            alert = true;
        } 

        else if(!$date.val().match($dateFormat)) {
            $(".alert-danger").text("Date incorrect. Should Be in YYYY-MM-DD Format.");
            alert = true;
        }

        else if (Date.parse($date.val()) > Date.now()) {

            $(".alert-danger").text("Date Should Be earlier than Today.");
            alert = true;
        }

        else if ($email.val() == "") {
            $(".alert-danger").text("Email Field Must Be filled.");
            alert = true;
        }

        else if (!$email.val().match($emailFormat)) {
            $(".alert-danger").text("Email Not Valid.");
            alert = true;
        }

        else if ($tel.val() == "") {
            $(".alert-danger").text("Tel Number Field Must Be filled.");
            alert = true;
        }

        else if (!$tel.val().match($telFormat)) {
            $(".alert-danger").text("Tel Number is  Not Valid. Must in 03XX-XXXXXXX or +92XXXXXXXXXX or +92XXX-XXXXXXX.");
            alert = true;
        }

        else if ($cnic.val() == "") {
            $(".alert-danger").text("Cnic Field Must Be filled.");
            alert = true;
        }

        else if (!$cnic.val().match($cnicFormat)) {
            $(".alert-danger").text("Cnic is  Not Valid.");
            alert = true;
        }
        
        else if ($file.val() == "") {
            $(".alert-danger").text("Please insert a picture.");
            alert = true;
        }

        else if (!imageFormats.includes($lastElement.toUpperCase())) {
            $(".alert-danger").text("Only Images to Upload.");
            alert = true;
        }

        // if errors occurded
        if (alert == true) {
            $(".alert-danger").css("display","block");
            window.setTimeout(() => {
                           hideAlert();
                       }, 5000);
        }

        else {
            var formData = new FormData(document.getElementById("form"));

            $.ajax({
                url: "validation.php",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                username: "mansoor",
                password: 1381,
                success: function (data) {

                    if(data == true) {
                       $(".alert-success").css("display","block");
                       window.setTimeout(() => {
                           hideAlert();
                       }, 5000);
                    }

                    else if(data == false) {
                        $(".alert-danger").css("display","block");
                        window.setTimeout(() => {
                           hideAlert();
                       }, 5000);
                    }
                },
                statusCode: {
                    404: function() {
                    alert( "page not found" );
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                }
            });

        }
        
        e.preventDefault();
    });

</script>
</body>
</html>