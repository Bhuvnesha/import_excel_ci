<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upload Excel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Upload the Excel file to Import</h1>
		<hr>
		 <form method="post"  id="import_form" enctype="multipart/form-data">
		 	<div class="form-group">
		 		 <p><label>Select Excel File </label>
                   <input type="file" class="form-control" name="file" id="file" required accept=".xls,.xlsx"/></p>
		 	</div>
                    <input type="submit" name="import" value="Import" class="btn btn-info">

                
      </form>

      <div id="customer_data"></div>
	</div>
	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		// alert("ready");
        load_data();
		function load_data()
		{
			$.ajax({
				'url':"<?php echo base_url('index.php/Excel_import/fetch'); ?>",
				'method':"POST",
                success:function(data){
                	$('#customer_data').html(data);
                }
			});
		}

		$('#import_form').on('submit',function(event){
			event.preventDefault();
            $.ajax({
            	'url':"<?php echo base_url('index.php/Excel_import/import'); ?>",
            	method:"POST",
            	//send form data in key value pairs
            	data: new FormData(this),
            	contentType:false,
            	cache:false,
            	processData:false,
            	success:function(data)
            	{
            		$('#file').val('');
            		load_data(); //displays data fresh
            		alert(data);
            	}
            });
		})
	})
</script>
</body>
</html>