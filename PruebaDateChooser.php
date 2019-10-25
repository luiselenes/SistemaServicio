<!DOCTYPE html>
<html>

<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css" >
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<script>
			$(function() {
			$('.dates #usr1').datepicker({
				'format': 'yyyy-mm-dd',
				'autoclose': true
			});
		});
			</script>
</head>

<body>
<div class="container">

	<div class="dates" style="margin-top:100px;color:#2471a3;">
    <label>Choose DOB</label>
    <input type="text" style="width:200px;background-color:#aed6f1;" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" >
  </div>
</div>

</body>
</html>