<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 网站全局路由定义
 *
 */

/*home&404*/
$route['default_controller'] = "home";
$route['404_override'] = '';

$route['p/([\d]+\.html)']='article/show/$1';


/*产品列表*/
$route['post/all'] = "post/all";
