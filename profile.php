<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Profile</title>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

</head>
<body>
	<script>
		$(function(){
				$('#button').on('click',function(){
					$('#data').toggle();
					$('#edit-field').toggle();
				});
		});
	</script>
	<button onclick="window.location.href='//localhost/HealthWebApp/'"> Go Back </button>
		<?php
            $xmlFileName = "xml/userprofile.xml";
            $users = simplexml_load_file($xmlFileName);

            $usersCount = $users->count();
            if($usersCount < 1){
                echo "No information found, please register";
                header("refresh:1; url=http://localhost/HealthWebApp/register.php");
            }

            else{
                //For future with multiple user support
                foreach($users as $user){
									$fname = $user->fname;
									$lname = $user->lname;
									$genders = $user->genders;
									$dob = $user->dob;
									$heightfeet = $user->heightfeet;
									$heightinch = $user->heightinch;
									$weight = $user->weight;
                }
            }
		?>
				<div id="data">
					<?php
						echo "Name: ". $fname. " ". $lname ."<br>";
						echo "Gender: ". $genders. "<br>";
						echo "Date of Birth: ". $dob. "<br>";
						echo "Height: ". $heightfeet." ft.". $heightinch. " in.<br>";
						echo "Weight: ". $weight. " lbs<br>";
					?>
				</div>
				<div id="edit-field" hidden>
					First name: <input type="text" name="fname" value=<?php echo $fname;?>><br />
					Last name: <input type="text" name="lname" value=<?php echo $lname;?>><br />
					Gender: <input type="text" name="genders" value=<?php echo $genders;?>><br />
					Date-of-birth<input type="text" name="dob" value=<?php echo $dob;?>><br />
					Height: <input type="text" name="heightfeet" value=<?php echo $heightfeet;?>> ft.
					<input type="text" name="heightinch" value=<?php echo $heightinch;?>> in.<br />
					Weight <input type="text" name="weight" value=<?php echo $weight;?>> lbs<br />
				</div>
				<input type="button" value="Edit">


</body>
</html>
