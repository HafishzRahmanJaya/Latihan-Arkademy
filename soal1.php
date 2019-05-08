<?php
$data = array(
                "nama"      => "Hafis",
                "kelas"     => "XII RPL 2",
                "hobi"      => array ("Game","Olahraga")
    
    );
    function Json($data){
        return json_encode($data);
    }
    echo Json($data);
