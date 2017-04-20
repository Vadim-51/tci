<?php

session_start();
if(isset($_SESSION['valid_user'])){
$uns = session_unset($_SESSION['valid_user']);
 if($uns){
  echo 'Session was unset';
}else{
  echo 'Something wrong happend';
}
}
if(isset($_SESSION['admin'])){
$uns = session_unset($_SESSION['admin']);
 if($uns){
  echo 'Session was unset';
}else{
  echo 'Something wrong happend';
}
}















?>





























