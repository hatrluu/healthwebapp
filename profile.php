<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Profile</title>
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
                echo "Here are your data: <br>";
                //For future with multiple user support
                foreach($users as $user){
                    echo "Name: ". $user->fname. " ". $user->lname ."<br>";
                    echo "Gender: ". $user->genders. "<br>";
                    echo "Date of Birth: ". $user->dob. "<br>";
                    echo "Height: ". $user->heightfeet." ft.". $user->heightinch. " in.<br>";
                    echo "Weight: ". $user->weight. " lbs<br>";
                }
            }
		?>
        <input type="button" value="Edit">
        <button onclick="window.location.href='//localhost/HealthWebApp/'"> Go Back </button>

</body>
</html>
