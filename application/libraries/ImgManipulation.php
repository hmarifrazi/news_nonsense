<?php if (! defined('BASEPATH')) exit('No direct script
access allowed');
class ImgManipulation {
	function resize_image($data) {
		$CI =& get_instance();
		$CI->load->library('image_lib', $data);
		if ($CI->image_lib->resize()) {
			return true;
		} else {
			echo $CI->image_lib->display_errors();
		}
	}
}