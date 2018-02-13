<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
    </head>
    <body>
       <?php
            if(isset($_REQUEST["submit"])){
                        $xml = new DOMDocument("1.0","UTF-8");
                        $xml->load("xml/userprofile.xml");

                        $rootTag = $xml->getElementsbyTagName("users")->item(0);

                        $dataTag = $xml->createElement("user");

                        $fname = $xml->createElement("fname", $_REQUEST['fname']);
                        $lname = $xml->createElement("lname", $_REQUEST['lname']);
                        $genders = $xml->createElement("genders", $_REQUEST['genders']);
                        $dob = $xml->createElement("dob", $_REQUEST['dob']);
                        $heightfeet = $xml->createElement("heightfeet", $_REQUEST['heightfeet']);
                        $heightinch = $xml->createElement("heightinch", $_REQUEST['heightinch']);
                        $weight = $xml->createElement("weight", $_REQUEST['weight']);

                        $dataTag->appendChild($fname);
                        $dataTag->appendChild($lname);
                        $dataTag->appendChild($genders);
                        $dataTag->appendChild($dob);
                        $dataTag->appendChild($heightfeet);
                        $dataTag->appendChild($heightinch);
                        $dataTag->appendChild($weight);

                        $rootTag->appendChild($dataTag);

                        $xml->save("xml/userprofile.xml");

                        echo "Information saved";
                        header("refresh:1; url=http://localhost/HealthWebApp/profile.php");
            }
        ?>
        <h1> Basic Info </h1>
		<form id="userprofile" acion="register.php" method="post">
			<p>First Name:</p>
			<input type="text" name="fname"><br>
			<p>Last Name:</p>
			<input type="text" name="lname"><br>
			<p>Gender:</p>
			<select name="genders">
				<option value="decline" selected> Decline to state</option>
				<option value="male"> Male</option>
				<option value="female"> Female</option>
				<option value="other"> Other</option>
			</select>
			<p>Date of Birth</p>
			<input type="date" name="dob" min="01/01/1800" max="31/12/2100"><br>
			<p>Height</p>
			<input type="number" name="heightfeet" min="0" max="10">ft. <input type="number" name="heightinch" min="0" max="12"> in.<br>
			<p>Weight</p>
			<input type="number" name="weight" min="10" max="1000" value="100">lbs<br><br>

			<input type="submit" name="submit" value="save">
			<input type="reset" value="clear">
		</form>
    </body>
</html>