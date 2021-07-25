<?php

require 'vendor/autoload.php';
$client = Elasticsearch\ClientBuilder::create()->build();
if ($client) {
  echo 'conectado';
}