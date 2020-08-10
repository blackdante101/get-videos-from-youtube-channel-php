<?php 
if (isset($_GET['id']) && isset($_GET['max'])) {
$api_key="AIzaSyBvbst9_NLx-XGZ3uuf3xr9L0EnuZ00Bys";
$channel_id=$_GET['id'];
$max_videos=$_GET['max'];
}
$video_list=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?maxResults='.$max_videos.'&channelId='.$channel_id.'&key='.$api_key.'&order=date'));
$numbers = array('5','10','15','20','25');
//UCAiKrZDrrSJnLpDM-zEVyng
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Youtube Channel Video Search</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<div style="margin-left:300px;width:800px;" class="container my-5  p-5 rounded bg-light">
			<h3 class="ml-5">Get Videos From Youtube Channel</h3>
			<p class="ml-5">to get a channel id you need to copy the text after the 'channel/' indication</p>
			<div class="row p-5">
				<form method="GET" action="youtube.php">
					<div class="form-group">
						<input class="form-control" style="width:500px" name="id" type="text" placeholder="Channel ID">
					</div>
					<div class="form-group">
						<select class="form-control" name="max">
						 <?php 
						 foreach($numbers as $number)
						 {
						 	echo "<option>".$number."</option>";

						 }
						 ?>
						</select>
					</div>
				
				<button  class="btn btn-primary">Get</button>	
				</form>
				
			</div>
		</div>
		<div class="container-fluid p-5">
			<?php 
			foreach ($video_list-> items as $item) {
				if (isset($item->id->videoId)) {
						echo "
						
						<iframe width='260' height='315' src='https://www.youtube.com/embed/".$item->id->videoId."' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
						";
			}

				}
			
			?>
		</div>

		
	</body>
</html>