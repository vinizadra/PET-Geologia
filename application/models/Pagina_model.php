<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina_model extends CI_Model {
    public function insert($pagina) {
        return $this->db->insert('pagina',$pagina);
    }

    public function buscaTodas() {
    	return $this->db->get('pagina')->result_array();
    }

    public function buscaPaginasIniciais() {
    	$this->db->where('atv_inicio', '1');
    	return $this->db->get('pagina')->result_array();
    }

    public function retorna($id) {
    	return $this->db->get_where('pagina', array(
    		'id' => $id
    	))->row_array();
    }

    public function salvar() {
    	$id = $this->input->post('id');

		$pagina = array(
			'user_id' => $this->input->post('user_id'),
			'titulo' => $this->input->post('titulo'),
			'conteudo' => $this->input->post('conteudo'),
			'atv_inicio' => $this->input->post('atv_inicio'),
			'url' => $this->input->post('url')	
		);

		$this->db->where('id', $id);
		return $this->db->update('pagina',$pagina);
    }

    public function remover($id) {
    	$this->db->where('id', $id);
    	return $this->db->delete('pagina');
    }
}