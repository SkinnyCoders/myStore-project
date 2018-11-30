<?php 
function alertDanger($data){
	$alert = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i>Perhatian!</h4>
                '.$data.'
              </div>';
    return $alert;
}

function alertInfo($data){
	$alert = '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i>Perhatian!</h4>
                '.$data.'
              </div>';
    return $alert;
}

function alertSucces($data){
	$alert = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Selamat!</h4>
                '.$data.'
              </div>';
    return $alert;
}

function alertWarning($data){
	$alert = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i>Perhatian!</h4>
                '.$data.'
              </div>';
    return $alert;
}

function alertInputDanger($data){
    $alert = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                '.$data.'
              </div>';
    return $alert;
}


 ?>