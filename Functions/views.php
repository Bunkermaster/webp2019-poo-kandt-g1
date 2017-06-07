<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 07/06/2017
 * Time: 09:58
 */
/**
 * @param string $currentPage slug de la page courante
 * @param string $slug slug de la page que je veux tester........ mouais
 * @return string active ou pas
 */
function isActive($currentPage, $slug){
    if($currentPage === $slug){
        return ' class="active"';
    }
    return '';
}
