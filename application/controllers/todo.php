<?php
	
	class Todo extends CI_Controller {
		
		function index()
		{

			$this->load->view('header');
			$this->load->view('body');
			$this->load->view('footer');
					
		}

		function add_todo() {
			$this->todo_model->insert_todo();
			//view_dashboard_calendar();
		}

		function show_newtodo($date) {
			$data['query'] =$this->todo_model->view_newtodo($date);
			$this->load->view('view_new_added_todo', $data);
		}

		function view_dashboard_subpages($date) {
			$this->load->view('dashboard_subpages');
		}

		function view_dashboard_calendar() {
			$data['dates'] = $this->todo_model->view_on_calendar();
			$this->load->view('dashboard_calendar', $data);
		}

		function xecute() {
			$data['dates'] = $this->todo_model->view_on_calendar();
			$this->load->view('header');
			$this->load->view('xecute', $data);
			$this->load->view('footer');
		}

		function view_todo_subpages($date) {
			$this->todo_model->toUpcoming();
			$data['upcom'] = $this->todo_model->viewUpcoming($date);
			$this->load->view('add_todo_sub_pages', $data);
		}
	}
?>