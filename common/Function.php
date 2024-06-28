<?php
namespace App\Common;
function debug($data){
    echo "<pre>";
    print_r($data);
}

function autoLoadFile($pathFolder){
    $file = scandir($pathFolder);
    $listPath = array_diff($file, [".", ".."]);
    foreach ($listPath as $item){
        require_once $pathFolder."/".$item;
    }

}

?>