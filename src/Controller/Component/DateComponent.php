<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DateComponent
 *
 * @author IFPR
 */
class DateComponent extends Component {

    public function formataData($old) {
        
        $originalDate = $old;
        
        $res = strtotime(str_replace('/', '-', $originalDate));
        
        if(!$res){
            return null;
        }
        
        $newDate = date("Y-m-d", $res);

        $dtNova = date_parse(str_replace('/', '-', $newDate));
        unset($dtNova['hour']);
        unset($dtNova['minute']);
        unset($dtNova['second']);
        unset($dtNova['fraction']);
        unset($dtNova['warning_count']);
        unset($dtNova['warnings']);
        unset($dtNova['errors']);
        unset($dtNova['error_count']);
        unset($dtNova['is_localtime']);

        return $dtNova;
    }
    
    public function formataDataCalendario($old) {
        
        $originalDate = $old;
        
        $res = strtotime(str_replace('/', '-', $originalDate));
        
        if(!$res){
            return null;
        }
        
        $newDate = date("d/m/Y", $res);

        $dtNova = date_parse(str_replace('/', '-', $newDate));
        unset($dtNova['hour']);
        unset($dtNova['minute']);
        unset($dtNova['second']);
        unset($dtNova['fraction']);
        unset($dtNova['warning_count']);
        unset($dtNova['warnings']);
        unset($dtNova['errors']);
        unset($dtNova['error_count']);
        unset($dtNova['is_localtime']);

        return $dtNova;
    }

}
