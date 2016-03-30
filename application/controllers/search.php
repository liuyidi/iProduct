<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: liuyidi
 * Date: 16/3/30
 * Time: 23:59
 * 搜索模块
 */



class Search extends CB_Controller{

    function __construct(){
        parent::__construct();
        $this->load->modal("search_m");
    }


}

?>