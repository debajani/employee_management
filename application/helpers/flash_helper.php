<?php
function flash() {
$this->load->library('session');
$this->load->helper("flash");
$flash = $_SESSION["flash"];
  unset($_SESSION["flash"]);

  foreach($flash as $key=>$val) {
      $str .= '<div id="flash" class="'.$key.'">'.$val."</div>";
  }
 
  return $str;
 
}
function setflash($error="An error has occurred",$type="error") {
  return $_SESSION['flash'][$type] = $error;
}
?>