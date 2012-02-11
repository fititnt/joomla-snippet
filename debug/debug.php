<?php

/*
 * Exibir apenas para um usuario especifico logado
 */
$debugforuser = &JFactory::getUser();
if ($debugforuser->username == 'fititnt') {

    echo 'oi fititnt';
}