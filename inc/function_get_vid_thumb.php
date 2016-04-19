<?php
	/*
		Returns absolute link to thumbnail of Youtube of Vimeo video
		Accepts clean Youtube or Vimeo URL
	*/

	function getVidThumb($url){
		if (strpos($url,'vimeo') !== false) {
			//extract the ID
			preg_match(
				'/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/',
				$url,
				$matches
			);
			//the ID of the Vimeo URL: 71673549 
			$id = $matches[2];
			$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));
			$vimeothumb = $hash[0]['thumbnail_large'];
			return $vimeothumb;
		}
		if (strpos($url,'youtu') !== false) {
			$queryString = parse_url($url, PHP_URL_QUERY);
			parse_str($queryString, $params);
			if (isset($params['v'])) {
				return "http://i3.ytimg.com/vi/{$params['v']}/0.jpg";
			}
		}
		else{
			return;
		}
	}