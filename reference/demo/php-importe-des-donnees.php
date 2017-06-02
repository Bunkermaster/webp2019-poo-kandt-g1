<?php
$monfichier = 'monfichier.sql';
$maCommande = escapeshellcmd('mysql -uprojetdefindannee -pmdpprojetdefindannee projetdefindannee < '.$monfichier);
shell_exec($maCommande);
//`mysql -uprojetdefindannee -pmdpprojetdefindannee projetdefindannee < monfichier.sql`;