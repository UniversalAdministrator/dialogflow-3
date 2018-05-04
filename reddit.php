<?php

$url = "https://www.reddit.com/r/jokes/new.json?sort=new";
$result = file_get_contents($url);
$json = json_decode($result);
$num = rand(0,20);
$title = $json->data->children[$num]->data->title;
$punchline = $json->data->children[$num]->data->selftext;

$result = $title . $punchline;

echo json_encode($result);

?>
