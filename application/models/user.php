<?php

class user extends CI_Model{

	protected $modelName = 'users';

	public function all()
	{
		$this->db->select("*");
		$this->db->from("users");
		return $this->db->get();
	
	}

	public function create(){
		$data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
			'description' => $this->input->post('description')
        );
        return $this->db->insert('products', $data);
	}

	public function show($id)
	{
		return $this->db->where(['id' => $id])->get($this->modelName)->row();		
	}

	public function delete($id)
	{
		$this->db->where(['id' => $id])->delete($this->modelName);
	}

	public function emailCheck($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
}
