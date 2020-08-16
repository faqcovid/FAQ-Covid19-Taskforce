<?php

require_once '../src/phpMyFAQ/External_Search.php';

require '../src/Bootstrap.php';

use phpMyFAQ\External_Search;

if(isset($_POST['mot']) && !empty($_POST['mot'])) {

    $ex = new External_Search('faqdata_temp',$faqConfig);
    //formatage du texte de recherche
    $word = $ex->formatSearchTerm($_POST['mot']);
    echo 'mot : '.$word.'<br>';
    //initiation de la recherche externe
    $obj = $ex->initExternalSearch($word);
   // print_r($result);
    //sauvegarde dans la table temporaire
    $ex->saveResult($obj);

}

?>