<?php

#Conentando com o o banco de dados e criando uma função de select
$con = new PDO('mysql:host=localhost;dbname=blogc', 'root', '');
$select = $con->query("SELECT * FROM post");