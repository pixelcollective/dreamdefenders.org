<?php

// Truncat Text by char count
function truncate_text($content, $snippet_len = 50) {
  $content =  html_entity_decode($content);
  $text = substr($content, 0, $snippet_len);
  $cutoff_pos = strrpos($text, ' '); // find position of last match for ' '

  if (strlen($content) > $snippet_len) {
    return substr($content, 0, $cutoff_pos)."..."; // return substring from 0 - $cutoff
  } else {
    return $content;
  }
}


// Simple API client - curl wrapper
function callAPI($method, $url, $data = false) {
  $curl = curl_init();

  switch ($method) {
    case "POST":
      curl_setopt($curl, CURLOPT_POST, 1);

      if ($data)
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      break;
    case "PUT":
      curl_setopt($curl, CURLOPT_PUT, 1);
      break;
    default:
      if ($data)
        $url = sprintf("%s?%s", $url, http_build_query($data));
  }

  // Optional Authentication:
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($curl, CURLOPT_USERPWD, "username:password");

  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($curl);

  curl_close($curl);

  return $result;
}

// Sepcial Number Formatting
// pass in the_field($value) and respective $unit
// dependancy: ACF [Pro]
function format_num($value, $unit) {
	$num = get_field($value);
	// format number comma
	$formattedNum = number_format((int)$num);
	echo($formattedNum." ".$unit);
}

// normalize url protocols
function url_protocol_handler($url) {
  if ( strpos($url, "http://") !== FALSE
  ||   strpos($url, "https://") !== FALSE ) {
        return $url;
  } else {
	$url = "http://" . $url;
	return $url;
  }
}
