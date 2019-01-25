<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {
	public function list() {
		$this->load->model('pagina_model');
		$paginas = $this->pagina_model->buscaTodas();
		$dados = array('paginas' => $paginas);
		$this->load->view('dashboard/pagina_list',$dados);
	}

	public function new() {
		$pagina = array(
			'user_id' => $this->input->post('user_id'),
			'titulo' => $this->input->post('titulo'),
			'url' => $this->input->post('url'),
			'conteudo' => $this->input->post('conteudo'),
			'atv_inicio' => $this->input->post('atv_inicio'),	
		);

		$this->load->model('pagina_model');
		$add_pagina = $this->pagina_model->insert($pagina);

		if($add_pagina) {
			$this->session->set_flashdata('success', 'Página adicionada com sucesso!');
			redirect('dashboard/pagina/list');	
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível adicionar a página');
			redirect('dashboard/pagina/list');
		}
	}

	public function cadastrar() {
		$this->load->model('midia_model');
		$midias = $this->midia_model->buscaTodas();
		$dados = array('midias' => $midias);
		$this->load->view('dashboard/pagina_cadastrar',$dados);
	}

	public function editar() {
		$id = $this->input->get('id');
		
		$this->load->model('pagina_model');
		$paginas = $this->pagina_model->retorna($id);
		$this->load->model('midia_model');
		$midias = $this->midia_model->buscaTodas();

		$dados = array(
			'paginas' => $paginas,
			'midias' => $midias
		);
		$this->load->view('dashboard/pagina_editar',$dados);
	}

	public function salvar($id) {
		$this->load->model('pagina_model');
		$save_pagina = $this->pagina_model->salvar($id);
		
		if($save_pagina) {
			$this->session->set_flashdata('success','Página editada com sucesso!');
			redirect('dashboard/pagina/list');
		} else {
			$this->session->set_flashdata('danger','Não foi ´possível editar a página');
		}
	}

	public function remover() {
		$id = $this->input->get('id');

		$this->load->model('pagina_model');
		$rm_pagina = $this->pagina_model->remover($id);

		if($rm_pagina) {
			$this->session->set_flashdata('success', 'Página removida com sucesso!');
			redirect('dashboard/pagina/list');
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível remover a página');
			redirect('dashboard/pagina/list');
		}

	}
}