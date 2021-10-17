<?php

    
    $resources = $data["list"];
   print_r($resources);
   echo "<br><br>";

   foreach ($resources as $resource) {
       echo $resource['name'];
       echo "<br>";
   }