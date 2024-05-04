<?php

$con = mysqli_connect("localhost","root","","course");

if(!$con){
    die('Koneksi Gagal'. mysqli_connect_error());
}

?>