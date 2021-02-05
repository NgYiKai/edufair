<!DOCTYPE html>
<html>

<?php
  echo '<link rel="stylesheet" href="../design/random.css" type="text/css">';
  ?>

<?php
// Get last modification time of the current PHP file
$file_last_mod_time = filemtime(__FILE__);

// Get last modification time of the main content (that user sees)
// Hardcoded just as an example
$content_last_mod_time = 1520949851;

// Combine both to generate a unique ETag for a unique content
// Specification says ETag should be specified within double quotes
$etag = '"' . $file_last_mod_time . '.' . $content_last_mod_time . '"';

// Set Cache-Control header
header('Cache-Control: max-age=10');

// Set ETag header
header('ETag: ' . $etag);

// Check whether browser had sent a HTTP_IF_NONE_MATCH request header
if(isset($_SERVER['HTTP_IF_NONE_MATCH'])) {
	// If HTTP_IF_NONE_MATCH is same as the generated ETag => content is the same as browser cache
	// So send a 304 Not Modified response header and exit
	if($_SERVER['HTTP_IF_NONE_MATCH'] == $etag) {
		header('HTTP/1.1 304 Not Modified', true, 304);
		exit();
	}
}
?>

<head>
<meta charset="UTF-8">
    <title>Chatbot</title>
    <script type="text/javascript" src="../js_files/chatbot.js"></script>

    <h1>Chatbot</h1>

</head>

<body>

<div id="main" class="main">
    
    <div>
      
      <input id="enter_message"  class="enter_message" type="text" placeholder="Ask a question..." autocomplete="off"/>
      </div>

</div>

</body>

</html>