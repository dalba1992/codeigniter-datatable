<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('items_view');
	}

	public function ajax_list_items()
	{
		$this->load->model('items_model','items');

		$list = $this->items->get_datatables();
		$data = array();
		$no   = $_POST['start'];
		foreach ($list as $items) {
			$no++;
			$row = array();
			$row[] = $items->supp_code;
			$row[] = $items->sku;
			$row[] = $items->item_name;
			$row[] = number_format($items->price,0,',','.');
			$row[] = number_format($items->sold_price,0,',','.');

			$row[] = '<a class="btn btn-sm btn-primary" href="'.$items->id.'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="#" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
			"draw"            => $_POST['draw'],
			"recordsTotal"    => $this->items->count_all(),
			"recordsFiltered" => $this->items->count_filtered(),
			"data"            => $data,
		);

		echo json_encode($output);
	}

}
