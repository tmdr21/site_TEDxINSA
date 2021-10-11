<?php 
    include('../authenticated.php');
    include('../../model/Connection.php');

    $voteKey = Connection::getInstance()->selectAllVoteKeys();
    //echo $voteKey;
    $fichier = fopen("../liste_codes.csv","w");
    fclose($fichier);
    $fichier = fopen("../liste_codes.csv","w+");
    //$chaine = "";
    $c1 = 0;
    $c2 = 1;

    foreach ($voteKey as $voteKey){
        if($c2 % 10 == 0){
            fputcsv($fichier,$chaine );
            $c1 = 0;
            $chaine[$c1] =  $voteKey->getCode();
        }
        else
            $chaine[$c1] =  $voteKey->getCode() ;
        $c2++;
        $c1++;
    }
    
    //fputcsv($fichier,$chaine );
    fclose($fichier);


    //header('Location: TEDxINSA-master.zip');
    $file = "../liste_codes.csv";
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: Binary');
    header('Content-disposition: attachment; filename="' .$file .'"');
    echo readfile($file);
?>