<?php
$data = new stdClass();
$data ->id = '1';
$data->h1 = 'Les Teletubbies';
$data->description = 'C\'est flippant. Ouesh gros';
$data->img = 'img/teletubbies.jpg';
$data->alt = 'Teletubbies';
$data->slug = 'les-teletubbies';
$data->{'nav-title'} = 'Teletubbies';
$data->default_page = '1';
require_once "View/page/form.php";
