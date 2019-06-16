<?php 
require 'libs/rb.php';
R::setup( 'mysql:host=127.0.0.1;dbname=host1359716_hat','host1359716_hat', 'ce1f8a25' );

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}

session_start();