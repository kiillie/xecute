<?php
	
	class Todo_Model extends CI_Model {
		
		function __construct()
   	 	{
        	parent::__construct();
    	}


    	/*********** adding TODO **********/

    	function insert_todo() {
    		$data = array (
    						'Title'=> $this->input->post('title'),
    						'Date'=> $this->input->post('date'),
    						'Start'=> $this->input->post('start'),
    						'Duration'=> $this->input->post('endtime'),
    						'Unit_Time'=> $this->input->post('unit'),
    						'Alarm_Time'=> $this->input->post('alarm'),
    						'Attachment_ID'=> $this->input->post('attach'),
    						'Message'=> $this->input->post('message'),
    						'Todo_Status'=>'Newly Added'
    			);

    		$this->db->insert('Todos', $data);
    	}

        /********* viewing TODO *********/


        //newly added
        function view_newtodo($d) {
            $status = "Newly Added";
            $this->db->where('Date', $d);
            $this->db->where('Todo_Status', $status);
            return $query =  $this->db->get('todos');
        }

        //upcoming todo
        function viewUpcoming($d) {
            $status = "Upcoming";
            $this->db->where('Date', $d);
            $this->db->where('Todo_Status', $status);
            return $query =  $this->db->get('todos');
        }

        //viewing distinct dates
        function view_on_calendar() {
            $this->db->distinct();
            $this->db->select('Date');
            return $this->db->get('todos');
        }



         /********* updating TODO *********/

        function toUpcoming() {
            $prev_stat = "Newly Added";
            $status = "Upcoming";

            $data = array(
               'Todo_Status' => $status
            );

            $this->db->where('Todo_Status', $prev_stat);
            $this->db->update('todos', $data); 
        }


        /******* count event ********/

        function count_event($d) {
            $this->db->where('Date',$d);
            return $this->db->count_all_results('todos');
        }
	}
?>