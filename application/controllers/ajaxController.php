<?php
class ajaxController extends CI_Controller{
	protected $pageTitle = 'Ajax Page';
	public function __construct()
	{

		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('user');
	}



	public function index()
	{
	 $this->load->view('basic/header', ['pageTitle' => $this->pageTitle]);
	 $this->load->view('ajax/index');
	 $this->load->view('basic/footer');
	}
	



	public function store()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
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

		 echo json_encode(['status' => true, 'message' => 'Data Insert Success']);
		
		
		} else {
			$errors = $this->form_validation->error_array();
			echo json_encode(['status' => false, 'errors' => $errors, 'message' => 'Data Insert Failed']);
			
		}
	}





	public function show($id) {		
		$user = $this->user->show($id);
		echo "<table class='table table-bordered'>";

		echo "<tr><td>ID</td><td>". $user->id ."<td></tr>";
		echo "<tr><td>Name</td><td>". $user->name ."<td></tr>";
		echo "<tr><td>Email</td><td>". $user->email ."<td></tr>";
		echo "<tr><td>Address</td><td>". $user->address ."<td></tr>";	

		echo "</table>";
 	}


		public function edit($id) {		
			$user = $this->user->show($id);
			echo json_encode($user);
	 	}	

 	

   

 	public function delete($id)
	 {
		try{
			$this->user->delete($id);	
			echo json_encode(['status' => true, 'message'=> $id]);
		}
		catch(Exception $exception){
			echo json_encode(['status' => false, 'message'=> $exception->getMessage()]);	
		}
		

		
	 }


	public function showTable()
	{		
		$users = $this->db->get('users')->result();
		echo "<table class='table table-sm'>";
		foreach($users as $user){
			$id = $user->id;
			echo "<tr>";
			echo "<td>". $user->id ."</td>";
			echo "<td onclick='show($id)'>". $user->name ."</td>";
			echo "<td >". $user->email ."</td>";
			echo "<td>". $user->address ."</td>";
			echo "<td onclick='edit($id)'><i class='fa fa-edit'></td>";
			echo "<td onclick='removeItem($id)'><i class='fa fa-trash'></td>";
			echo "</tr>";
		}
		echo "</table>";
		
	}

	public function update($id){
		
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


			echo json_encode(['status' => true, 'message' => 'Data Insert Success']);
		
		
		} else {
			$errors = $this->form_validation->error_array();
			echo json_encode(['status' => false, 'errors' => $errors, 'message' => 'Data Insert Failed']);
			
		}

	}
}
