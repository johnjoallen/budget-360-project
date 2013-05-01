<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="budget360.css" rel="stylesheet" type="text/css" />
	<title>Budget 360</title>
	<!-- link JS libs -->
	<script src="libs/jquery.js" type="text/javascript"></script>
	<script src="libs/jquery.validate.js" type="text/javascript"></script>
	<!-- Initialise JS validation-->
	<script>
	$(document).ready(function(){
	    $("#myform").validate({
			rules: {
				myfield: "required"
			},
			messages: {
				myfield: "Please insert something"
			}
		});
	 });
	</script>
</head>
<body>
	<form id="myform" action="" method="post">
    	<p>
        	<label for="myfield">Insert something</label>
            <input type="text" name="myfield" id="myfield" />
        </p>
        <p>
        	<input type="submit" name="submit" id="submit" value="Validate" />
        </p>
    </form>
</body>
</html>