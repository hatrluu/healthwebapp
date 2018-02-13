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
	<script>
		$(function(){
        loadSettings();
				$('#edit-bttn').on('click',function(){
					$('#data').hide();
          $('#save-bttn').show();
          $('#edit-bttn').hide();
					$('#edit-field').show();
				});

        $('#save-bttn').on('click',function(){
          if(typeof(Storage)!=="undefined") {
            localStorage.setItem("fname", $('#input1').val());
            localStorage.setItem("lname", $('#input2').val());
            localStorage.setItem("genders", $('#input3').val());
            localStorage.setItem("dob", $('#input4').val());
            localStorage.setItem("heightfeet", $('#input5').val());
            localStorage.setItem("heightinch", $('#input6').val());
            localStorage.setItem("weight", $('#input7').val());
            $('#data').show();
            $('#edit-bttn').show();
  					$('#edit-field').hide();
            $('#save-bttn').hide();
            loadSettings();
           }else {
            document.getElementById("data").innerHTML="Sorry, your browser does not support web storage...";
            }
        });



		}); // End jQuery

    function loadSettings(){
      $('#fname').html(localStorage.fname);
      $('#lname').html(localStorage.lname);
      $('#genders').html(localStorage.genders);
      $('#dob').html(localStorage.dob);
      $('#heightfeet').html(localStorage.heightfeet);
      $('#heightinch').html(localStorage.heightinch);
      $('#weight').html(localStorage.weight);
    }


	</script>
	<button onclick="window.location.href='//localhost/HealthWebApp/'"> Go Back </button>

				<div id="data">
					<?php
            echo "Data from xml<br>";
						echo "Name: ". $fname. " ". $lname ."<br>";
						echo "Gender: ". $genders. "<br>";
						echo "Date of Birth: ". $dob. "<br>";
						echo "Height: ". $heightfeet." ft ". $heightinch. " in<br>";
						echo "Weight: ". $weight. " lbs<br>";
					?>
				</div>
				<div id="edit-field" hidden>
					First name: <input id="input1" type="text" name="fname" value=<?php echo $fname;?>><br />
					Last name: <input id="input2" type="text" name="lname" value=<?php echo $lname;?>><br />
					Gender: <input id="input3" type="text" name="genders" value=<?php echo $genders;?>><br />
					Date-of-birth<input id="input4" type="text" name="dob" value=<?php echo $dob;?>><br />
					Height: <input id="input5" type="text" name="heightfeet" value=<?php echo $heightfeet;?>> ft
					<input id="input6" type="text" name="heightinch" value=<?php echo $heightinch;?>> in<br />
					Weight <input id="input7" type="text" name="weight" value=<?php echo $weight;?>> lbs<br />
				</div>
        <div id="sqlite-data">
          <br><br>
            This is data from sqlite:<br>
            First name: <span id="fname"></span><br>
            Last name:  <span id="lname"></span><br>
            Gender:  <span id="genders"></span><br>
            Date-of-birth:  <span id="dob"></span><br>
            Height:  <span id="heightfeet"></span> ft  <span id="heightinch"></span> in <br>
            Weight:  <span id="weight"></span><br>


        </div>
				<button id="edit-bttn">Edit</button>
        <button id="save-bttn" hidden>Save</button>

</body>
</html>
