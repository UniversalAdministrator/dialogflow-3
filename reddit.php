<?php

$url = "https://www.reddit.com/r/jokes/new.json?sort=new";
$result = file_get_contents($url);
$json = json_decode($result);
$title = $json->data->children[0]->data->title;
$punchline = $json->data->children[0]->data->selftext;
echo json_encode($title);
echo json_encode($punchline);

?>
