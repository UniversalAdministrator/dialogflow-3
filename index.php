<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

// Process only if method is POST from Dialogflow
if ($method == "POST"){
  $requestBody = file_get_contents('php://input');
  $json = json_decode($requestBody);

  $text = $json->result->resolvedQuery;
  $text = strtoupper($text);


  $result = ["tjenare"];

  $response = new \stdClass();
  $response->fulfillmentText = "tjenare";
  $response->fulfillmentMessages[] = array('title'=> 'hejsan', 'url'=>'www.google.com');
  $response->displayText = $result;
  $response->source = "webhook";
  echo json_encode($response);
} else {
  echo "Not allowed";
}

?>
