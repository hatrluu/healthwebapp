<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Heart rate</title>
</head>
    <?php
      $xmlFileName = "xml/userprofile.xml";
      $users = simplexml_load_file($xmlFileName);

      if($users->count() < 1){
        echo "No information found, please register";
        header("refresh:1; url=http://localhost/HealthWebApp/register.php");
      }

      else{
        echo "
          <h1>Heart rate</h1>
          <p>Your current heart rate: </p>
          <form action='heartrate.php' method='POST'>
            <input name='heartrate' type='number' max='300'><br />
            <input type='submit' name='submit' value='Log value'>
          </form>
        ";
        if(isset($_REQUEST["submit"])){
                    $xml = new DOMDocument("1.0","UTF-8");
                    $xml->load("xml/heartrate.xml");

                    $rootTag = $xml->getElementsbyTagName("logs")->item(0);

                    $dataTag = $xml->createElement("log");

                    $heartrate = $xml->createElement("heartrate", $_REQUEST['heartrate']);
                    $timestamp = $xml->createElement("timestamp", $_REQUEST['lname']);


                    $dataTag->appendChild($heightinch);
                    $dataTag->appendChild($weight);

                    $rootTag->appendChild($dataTag);

                    $xml->save("xml/userprofile.xml");
      }
    ?>
</html>
