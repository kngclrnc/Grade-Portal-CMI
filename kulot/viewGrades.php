<?php 
	include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
	<link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/page.css?v=<?php echo time();?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
	

</head>

<script>
    $(document).ready(function(){
		// Activate tooltip
		$('[data-toggle="tooltip"]').tooltip();
		$('#data_table').DataTable();
		// Select/Deselect checkboxes
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function(){
			if(this.checked){
				checkbox.each(function(){
					this.checked = true;                        
				});
			} else{
				checkbox.each(function(){
					this.checked = false;                        
				});
			} 
		});
		checkbox.click(function(){
			if(!this.checked){
				$("#selectAll").prop("checked", false);
			}
		});
	});
</script>
<body>
    
    <div class="wrapper">
    <!-- Sidebar  -->
    <?php system_navbar(); ?>

    <!-- Page Content  -->
    <div id="content">

        <?php toggle_navbar('PAGE1', 'PAGE2', 'PAGE3', 'PAGE4'); ?>
        <!-- content -->
       
        <div class="container-fluid">
			<div class="table-responsive">
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-xs-6">
								<h2><b>Grade Viewing</b></h2>
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover" id="data_table">
						<thead>

						<!-- dito kau mga eedit sa table -->
							<tr>
								<th>
									<span class="custom-checkbox">
										<input type="checkbox" id="selectAll">
										<label for="selectAll"></label>
									</span>
								</th>
								<th>Prof name</th>
								<th>Subject code</th>
								<th>Subject name</th>
								<th>Term</th>
								<th>Quarter</th>
								<th>School Year</th>
                                <th>Grade</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$conn = mysqli_connect("localhost", "root", "", "cmi_gradedb");
							// Check connection
							if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
							}
							$sql = "SELECT * FROM `student_gradetb`";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {

								echo "
								<tr><td>
									<span class='custom-checkbox'>
										<input type='checkbox' id='checkbox5' name='options[]' value='1'>
										<label for='checkbox5'></label>
									</span>
								</td>
								";
								echo "<td>" . $row["teacher_id"]. "</td>";
								echo "<td>" . $row["subject_id"]. "</td>";
								echo "<td>" . $row["subject_name"]. "</td>";
								echo "<td>" . $row["semester"]. "</td>";
								echo "<td>" . $row["quarter"]. "</td>";
								echo "<td>" . $row["school_year"]. "</td>";
								echo "<td>" . $row["grade"]. "</td>";

								}
							} else { echo "0 results"; }
							$conn->close();
						?>					
							
						</tbody>
					</table>

</body>

 <!-- jQuery CDN - Slim version (=without AJAX) -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });
});

</script>
</html>