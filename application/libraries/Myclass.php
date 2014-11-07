<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Myclass{

	function notice($str){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><script>'.$str.'</script>';
	}
	
}

?>