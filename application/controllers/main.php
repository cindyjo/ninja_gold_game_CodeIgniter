<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');
class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		if(!isset($this->session->userdata['gold']))
		{
			$this->session->set_userdata('gold', 0);
			$this->session->set_userdata('log', array());
		}

		$this->load->view('index');
	}
	//determine how much gold to give/take away redirect with activities log
	public function process_money()
	{
		$color= 'green';
		if($this->input->post('building')==='farm')
		{
			$gold=rand(10,20);
			$this->session->set_userdata('gold', $this->session->userdata['gold']+$gold);
		}
		if($this->input->post('building')==='cave')
		{
			$gold = rand(5,10);
			$this->session->set_userdata('gold', $this->session->userdata['gold']+$gold);
		}
		if($this->input->post('building')==='house')
		{
			$gold = rand(2,5);
			$this->session->set_userdata('gold', $this->session->userdata['gold']+$gold);
		}
		if($this->input->post('building')==='casino')
		{
			$gold = rand(-50,50);
			if($gold < 0)
			{
				$color= 'red';
			}
			$this->session->set_userdata('gold', $this->session->userdata['gold']+$gold);
		}

		$activity = array(
							'location' => $this->input->post('building'),
							'gold' => $gold,
							'time' => date("F jS Y g:i a"),
							'color' => $color);

		$log = $this->session->userdata('log');
		$log[] = $activity;
		$this->session->set_userdata('log', $log);
		redirect('./');
	}
	public function reset() {
		$this->session->unset_userdata('log');
		$this->session->unset_userdata('activity');
		$this->session->unset_userdata('gold');
		redirect('./');
	}
}

//end of main controller