<DOCTYPE! html>
<html>
	<head>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->

	<link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">

	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	</head>


	<body>
		<section>
		<?php

			$url = file_get_contents("https://www.hpb.health.gov.lk/api/get-current-statistical");
			$data = json_decode($url, true);

		?>


<section class="book py-5">
	<center><div class="container py-lg-5 py-sm-3">
		<h4 class="heading text-capitalize text-center">Covid19 Update</h4>
		<div class="row mt-5 text-center">
			<div class="col-lg-4 col-sm-6">
				<div class="grid-info">
					<div class="icon">
						
					</div>
					<h5>Local new cases</h5>
					<p class="mt-3"><p class="mt-3"><?php echo $data['data']['local_new_cases'];?></p></p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 mt-sm-0 mt-5">
				<div class="grid-info">
					<div class="icon">
						
					</div>
					<h5>Local total cases</h5>
					<p class="mt-3"><p class="mt-3"><?php echo $data['data']['local_total_cases'];?></p></p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 mt-lg-0 mt-5">
				<div class="grid-info">
					<div class="icon">
						
					</div>
					<h5>Local deaths</h5>
					<p class="mt-3"><p class="mt-3"><?php echo $data['data']['local_deaths'];?></p></p>
				</div>
			</div>

				<div class="col-lg-4 col-sm-6 mt-lg-0 mt-5">
				<div class="grid-info">
					<div class="icon">
						
					</div>
					<h5>Total recovered</h5>
					<p class="mt-3"><p class="mt-3"><?php echo $data['data']['local_recovered'];?></p></p>
				</div>
			</div>
		
		</div>
	</div></center>
	<center>	<?php

$url = file_get_contents("https://www.hpb.health.gov.lk/api/get-current-statistical");
$data = json_decode($url, true);

$db = mysqli_connect("localhost","admin","admin","covid19");

  $r1=$data['data']['update_date_time'];
  $r2=$data['data']['local_new_cases'];
  $r3=$data['data']['local_total_cases'];
  $r4= $data['data']['local_total_number_of_individuals_in_hospitals'];
  $r5=$data['data']['local_deaths'];
  $r6=$data['data']['local_recovered'];
  $r7=$data['data']['global_new_cases'];
  $r8 =$data['data']['global_total_cases'];
  $r9 = $data['data']['global_deaths'];
  $r10 =$data['data']['global_recovered'];

$sql1 = "INSERT INTO `data`( update_date_time, local_new_cases, local_total_cases,local_total_number_of_individuals_in_hospitals, local_deaths, local_recovered, global_new_cases, global_total_cases, global_deaths, global_recovered) VALUES ('$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r8','$r9','$r10')";
$db->query($sql1);

echo "<table>";

echo "  <tr>
				<th>&nbsp&nbsp&nbsp&nbsp  Month & Date  &nbsp&nbsp&nbsp&nbsp</th>
				<th>&nbsp&nbsp&nbsp&nbsp  New Case  &nbsp&nbsp&nbsp&nbsp</th>
				<th>&nbsp&nbsp&nbsp&nbsp  Cumulative Infections  &nbsp&nbsp&nbsp&nbsp</th>
				<th>&nbsp&nbsp&nbsp&nbsp  Local Recovered &nbsp&nbsp&nbsp&nbsp</th>
				<th>&nbsp&nbsp&nbsp&nbsp  Cumulative Deaths</th>
		</tr>";


$result = mysqli_query($db,"SELECT * FROM data order by  data_id desc limit 7");
 while ($row = mysqli_fetch_array($result)){

echo "	<tr>
				<td><center>".$row['update_date_time']."</center></td>
				<td><center>".$row['local_new_cases']."</center></td>
				<td><center>".$row['local_total_cases']."</center></td>
				<td><center>".$row['local_recovered']."</center></td>
				<td><center>".$row['local_deaths']."</center></td>
		</tr>";
}

echo "</table>";
?></center>
</section>

	</body>
</html>