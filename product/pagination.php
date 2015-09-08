<?php
	$qa=$disable_pre=$disable_nxt=NULL;
    $query='still_unset'; 
    $page=$pg_qty=$limit=1;
    $offset=0;
    if(!empty($_GET['page'])) $page=$_GET['page'];

    function paginate($page,$qa,$limit){
        global $conn;
        $offset=($page-1)*$limit;
        $psql=search($offset,$limit,$qa);
        return $psql->fetchAll(PDO::FETCH_ASSOC);
    }
?>