<?php

class Messages extends CI_Controller {

	public function index()
	{
		$data['entries'] = $this->message->getMessages();

		$this->load->view('templates/header');
		$this->load->view('templates/guestbook', $data);
	}

	public function saveMessage()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$message=$this->input->post('message');

		if ($this->validateFields($name, $email, $message)) {
			
			if ($this->message->saveMessage($name,$email,$message) == true ) {
				echo json_encode([
					"statusCode"=>200
				]);		
			}
			else {
				echo json_encode([
					"statusCode"=>400
				]);	
			}
		}
		else {
			echo json_encode([
				"statusCode"=>500
			]);
		}
		
	}

	public function validateFields($name, $email, $message){

		if (empty($name) || empty($email) || empty($message)) {
			return false;
		}

		if (strlen($name) <= 3) {
			return false;
		}

		if (strlen($message) <= 5) {
			return false;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return false;
		}

		return true;

	}

	public function viewMessage($id)
	{
		$data['message'] = $this->message->getMessage($id);
		$this->load->view('templates/header');
		$this->load->view('templates/viewMessage', $data);
	}

	public function listMessages()
	{
		$data['entries'] = $this->message->getMessages();
		$this->load->view('templates/view', $data);
	}

	public function updateMessages()
	{
		$this->message->updateMessages();
		
	}
}