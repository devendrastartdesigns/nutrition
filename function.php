<?php

function getTotalRecipe($config){
  $apiurl = $config["apiEndPoint"].'getTotalRecipe.php';
  $type="POST";
  $data['username'] = $config["username"];
  $data['password'] = $config["password"];
  $data['apiID'] = $config["apiID"];
  $data['apiPassword'] = $config["apiPassword"];

  $curl = curl_init($apiurl);
  curl_setopt($curl, CURLOPT_POST, 1);
  // Insert the data
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($curl);
  $res = (array)json_decode($result);
  curl_close($curl);
  if($res['status'] == 'success'){
  return $res['recipes'];
  }else{
  return false;
  }

}