<?php
 
defined('BASEPATH') or exit('No direct script access allowed');

class Parent_Controller extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->data['judul'] = 'Human Resource Information System (HRIS) ASDP';  
 
	}
}
