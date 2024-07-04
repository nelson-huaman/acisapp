<?php

function debuguear($variable) : string {
   echo '<pre>';
   var_dump($variable);
   echo '</pre>';
   exit;
}

function stringHTML($html) : string {
   $s = htmlspecialchars($html);
   return $s;
}