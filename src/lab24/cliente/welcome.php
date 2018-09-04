<?php
echo '<head>
  <meta charset="UTF-8">
</head>';
$name = $_POST["name"];
$url = "https://msft3c-ramonromerotec.c9users.io/lab24/silex/web/index.php/hello/".$name; //Route to the REST web service
$c = curl_init($url);
$response = curl_exec($c);
curl_close($c);
echo ($response[0]); 
?>