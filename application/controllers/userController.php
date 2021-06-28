<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user');
	}


	public function index()
	{
		$users = $this->db->get('users')->result();
    	$this->load->view('user_list', ['users' => $users]);		
	}

	public function create()
	{
		$this->load->view('add_user');
	}

	public function edit($id)
	{
		$user = $this->db->where(['id' => $id])->get('users')->row();
		$this->load->view('user/edit', ['user' => $user]);
	}




	public function store()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('address', 'Address','required');


		if ($this->form_validation->run()) {
			$user = array (
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address')
			);

		 $this->db->insert('users', $user);
		
		
		} else {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $errors);
			redirect(base_url('userController/create'));
		}

		redirect('/userController');
	}





	public function update($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('address', 'Address','required');

		if ($this->form_validation->run()) {
			$user = array (
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address')
				);

		$this->db->where(['id' => $id])->update('users', $user);
		} else {
		$errors = $this->form_validation->error_array();
		$this->session->set_flashdata('errors', $errors);
		redirect(base_url('userController/edit/'. $id));
		}

		redirect('/userController');
	}





	public function show($id) {		
		$modelUserData = $this->user->show($id);
		$this->load->view('user/show',['user' => $modelUserData]);
	 }
   
	 public function delete($id)
	 {
		$this->user->delete($id);
   
		redirect('/userController');
	 }

	 public function modal(){
		 $this->load->view("modal");
	 }

}
