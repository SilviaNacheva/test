<?php 
if (!empty($_GET['location'])) {
    $maps_url = 'https://' .
        'maps.googleapis.com/' .
        'maps/api/geocode/json' .
        '?address=' . urlencode($_GET['location']);
    $maps_json = file_get_contents($maps_url);
    $maps_array = json_decode($maps_json,true);

    $lat = $maps_array['results'][0]['geometry']['location']['lat'];
    $lng = $maps_array['results'][0]['geometry']['location']['lng'];

        $url = 'https://' .
        'api.instagram.com/v1/media/search' .
        '?lat=' . $lat .
        '&lng=' . $lng .
        '&client_id=CLIENT-ID'; //replace "CLIENT-ID"
    $json = file_get_contents($url);
    $array = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Test</title>
</head>
<body>
	<form action=""> 
		<input type="text" name="location"/>
		<button type="submit">Submit</button>
		<br>
		<?php
    	if (!empty($array)) {
	        foreach ($array['data'] as $key => $item) {
	            echo '<img id="' . $item['id'] . '" src="' . $item['images']['low_resolution']['url'] . '" alt=""/><br/>';
	        }
    	}
    ?>
	</form>
</body>
</html>