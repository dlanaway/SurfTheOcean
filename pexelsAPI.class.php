<?php 

class pexelAPI{
    private $apiKey;
    function __construct() {
        $this->apiKey = "9GjxIv9xVupF3IXF3uwU9hxeY9z98cIOJigJCc5nJwwjz1S0XPKNKxay";
		$this->baseUrl = "https://api.pexels.com/v1/search?query=ocean";
    }

    public function getData($query = ""){
		$url = $this->baseUrl . $query;
         
             $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, ($url));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER,[
            "Authorization: {$this->apiKey}"
        ]);

        $result = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        $status = ($httpCode == 200) ? "success" : "error";
        return [
            "status" => $status,
            "status_code" => $httpCode,
            "result" => json_decode($result, true)
        ];
    }
	
	public function getCount() {
		$pexelResponse = $this->getData();
		$imageCount = $pexelResponse['result']['total_count'];
		return $imageCount;
	}
	
	public function getRandomPage() {
		$imageCount = $this->getCount();
		$randomPage = rand(1,$imageCount/10);
		return $randomPage;
	}
	
	public function getRandomImage() {
		$page = $this->getRandomPage();
		$query = "&per_page=10&page=" . $page;
		$pexelResponse = $this->getData($query);
		if ($pexelResponse['status'] == "error") {
			$photoDets = array("src"=>"ocean.jpg", "alt"=>"A bpat in the ocean with an island in the background");
			return ($photoDets);
		} else {
			$photoList = array($pexelResponse['result']['photos']);
			$randomPhotoIndex = array_rand($photoList, 1);
			$photoSrc = $photoList[$randomPhotoIndex]['src']['tiny'];
			$photoAlt = $photoList[$randomPhotoIndex]['alt'];
			$photoDets = array("src"=>$photoSrc, "alt"=>$photoAlt);
			return ($photoDets);
		}
	}
}

?>