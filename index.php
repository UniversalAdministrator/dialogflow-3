<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

// Process only if method is POST from Dialogflow
if ($method == "POST"){
  // read the request and determine which further API to call
  $requestBody = file_get_contents('php://input');
  $json = json_decode($requestBody);

  $text = $json->result->resolvedQuery;
  $text = strtoupper($text);

  // working with other APIs to get specific information
  $url = "https://www.reddit.com/r/jokes/new.json?sort=new";
  $result = file_get_contents($url);
  $json = json_decode($result);
  $title = $json->data->children[0]->data->title;
  $punchline = $json->data->children[0]->data->selftext;

  // the string to be sent back to the user
  $result = "tjenare";

  $response = new \stdClass();
  $response->fulfillmentText = $title;
  $response->fulfillmentMessages[] = array('text'=> array('text'=>[$title]));
  $response->source = "webhook";
  echo json_encode($response);
} else {
  echo "Not allowed";
}

?>
