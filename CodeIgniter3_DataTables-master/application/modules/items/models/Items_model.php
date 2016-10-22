<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items_model extends MY_Model {

	public $table  = 'items';
	public $column = array(
					'items.id',
					'supplier.supp_code',
					'items.sku',
					'items.item_name',
					'items.price',
					'items.sold_price'
				);

    public function _jointable() {
        $this->db->join('supplier', 'items.supp_code = supplier.supp_code');
    }
}
