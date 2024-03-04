<?php
/*
require_once("./stackAPI.class.php");
$stacks = new stackAPI();
$page = 1;

$get_image = $stacks->get_stack('search', ['per_page' => 40, "query" => "ocean", "page" => $page]);

print_r($get_image);
*/

// 8000 totat, 10 per page, 800 pages

$page = rand(1,800);



$apiKey = "9GjxIv9xVupF3IXF3uwU9hxeY9z98cIOJigJCc5nJwwjz1S0XPKNKxay";


       $url = "https://api.pexels.com/v1/search?query=ocean&per_page=10&page=124"; 
//	   $url = "https://music.abcradio.net.au/api/v1/plays/triplej/now.json";
     
echo $url;

        $curl = curl_init($url);
        //curl_setopt($curl, CURLOPT_URL, "{$url}");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER,[
            "Authorization: {$apiKey}"
        ]);

        $result = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        $status = ($httpCode == 200) ? "success" : "error";
        $results =  [
            "status" => $status,
            "status_code" => $httpCode,
            "result" => json_decode($result, true)
        ];
		$pexels = json_decode($result, true);
//		print_r($results);
//		print_r($pexels);
		$photoList = $pexels['photos'];
//		print_r($photoList);
//		echo PHP_EOL . PHP_EOL;
		$photoData = array_rand($photoList, 1);
		print_r($photoList[$photoData]);
		
/*
		$total = $pexels['total_results'];
		echo " " .$total;
		$page = rand(1,$total/10);
		echo " " . $page;
*/		
//       $newUrl = "https://api.pexels.com/v1/search?query=ocean&per_page=" . $page; 
		
		
?>