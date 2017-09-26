<?php

namespace App\View\Helper;

use Cake\View\Helper;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataHelper
 *
 * @author IFPR
 */
class DataHelper {

    //put your code here

    /* src/View/Helper/LinkHelper.php (using other helpers) */

  
    public function formataData($old) {
        $originalDate = $old;
        $newDate = date("Y-m-d", strtotime($originalDate));
//        $this->log('nova data: ' . $newDate);
//        $this->request->data['data_fim'] = $newDate;

        return $newDate();
    }

}
