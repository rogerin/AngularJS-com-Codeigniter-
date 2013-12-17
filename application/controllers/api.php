<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
		$this->load->view('angular_api');
	}

	public function listar(){
		sleep(1);
		echo json_encode($this->db->get('sv_instrucoes')->result());
		//print_r($this->db->get('sv_instrucoes')->result());
	}

	public function salvar() {

	// $arrayName = array('instrucaoId' => 1, 'instrucaoTxt' => $this->input->post('instrucaoTxt'));
	//	 echo json_encode($arrayName);
		 //echo json_decode(array($this->input->post()));
			sleep(1);
		  	$data = json_decode(file_get_contents('php://input'), TRUE);
   			

		    //$slug = url_title($data['title'], 'dash', TRUE);

		    $retval = array(
		        'instrucaoTxt' => $data['instrucaoTxt']
		    );

		    $this->db->insert('sv_instrucoes', $retval);

		    echo json_encode(array('instrucaoId' => $this->db->insert_id(), 'instrucaoTxt' => $data['instrucaoTxt']));
	}
}

/* End of file api.php */
/* Location: ./application/controllers/api.php */