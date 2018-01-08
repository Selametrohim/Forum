<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('autoversion'))
{
	function autoversion($file)
	{
	  $ver = '?v='.filemtime(FCPATH . 'assets/' . $file);
	  
	  return base_url('assets/' . $file . $ver);
	}
}

if ( ! function_exists('encode_url'))
{
	function encode_url($plaintext, $url_safe = TRUE)
	{
		$CI =& get_instance();
		$CI->load->library('encrypt');

		$ciphertext = $CI->encrypt->encode($plaintext);

		if ($url_safe) {
			$ciphertext = strtr(
				$ciphertext,
				[
					'+'	=> '.',
					'='	=> '-',
					'/'	=> '~'
				]
			);
		}

		return $ciphertext;
	}
}

if ( ! function_exists('decode_url'))
{
	function decode_url($ciphertext)
	{
		$CI =& get_instance();
		$CI->load->library('encrypt');
		
		$ciphertext = strtr(
			$ciphertext,
			[
				'.'	=> '+',
				'-'	=> '=',
				'~'	=> '/'
			]
		);

		$plaintext = $CI->encrypt->decode($ciphertext);

		return $plaintext;
	}
}