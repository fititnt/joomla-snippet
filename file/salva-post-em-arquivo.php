<?php


/* 
 * Salva um array em um arquivo de texto
 * Default: $_POST
 * @author     Emerson Rocha Luiz [ emerson at webdesign.eng.br - @fititnt - http://fititnt.org ]
 */
function LogArrayToFile($data = NULL){
    if($data == NULL){
        $data = JRequest::get('POST');
    }
    if( !($file = fopen( JPATH_BASE."/../log.txt", "a+") )) { // Um diretorio acima da raiz do joomla
        echo 'Erro ao criar arquivo!';        
    } else {
        fwrite($file, date("Y-m-d h:i:s"). " | ");
        foreach($data AS $item => $value){
            $conteudo = $item . '> '.$value . ' | ';
            if( fwrite($file, $conteudo) === FALSE ){
                echo 'Erro ao escrever dados';
            }
        }
        fwrite($file, "\n");
    }    
}