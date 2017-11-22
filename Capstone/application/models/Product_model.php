<?php 

class Product_model extends CI_Model 
{
	
	public function add_product()
	{
		$data = array(
				'product_name' => $this->input->post('product_name'),
				'product_description' => $this->input->post('product_description'),
				'product_price' => $this->input->post('product_price'),
				'upc_code' => $this->input->post('upc_code'),
				'sku_code' => $this->input->post('sku_code'),
				'product_stock' => $this->input->post('product_stock')
				);

		$this->db->insert('products', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function display_products()
	{
		$this->db->select('*');
		$this->db->from('products');
		$query = $this->db->get();

		return $query->result();
	}

	public function singleProduct($id)
	{
		$this->db->select('*');
		$this->db->where('product_id', $id);
		$this->db->from('products');
		$query = $this->db->get();
		return $query->row();
	}

	public function editProduct($id)
	{
		$this->db->select('*');
		$this->db->where('product_id', $id);
		$this->db->from('products');
		$query = $this->db->get();
		return $query->row();

		$data = array(
				'product_name' => $this->input->post('product_name'),
				'product_description' => $this->input->post('product_description'),
				'product_price' => $this->input->post('product_price'),
				'upc_code' => $this->input->post('upc_code'),
				'sku_code' => $this->input->post('sku_code'),
				'product_stock' => $this->input->post('product_stock')
				);

		$this->db->select('*');
	 	$this->db->where('product_id', $id);
	 	$this->db->update('products', $data);
	 	return $id;

	}

	public function updateProduct($id)
	{
		$data = array(
				'product_name' => $this->input->post('product_name'),
				'product_description' => $this->input->post('product_description'),
				'product_price' => $this->input->post('product_price'),
				'upc_code' => $this->input->post('upc_code'),
				'sku_code' => $this->input->post('sku_code'),
				'product_stock' => $this->input->post('product_stock')
				);

		$this->db->select('*');
	 	$this->db->where('product_id', $id);
	 	$this->db->update('products', $data);
	 	return $id;
	}

	public function deleteProduct($id)
	{
		$data = array(
				'product_name' => $this->input->post('product_name'),
				'product_description' => $this->input->post('product_description'),
				'product_price' => $this->input->post('product_price'),
				'upc_code' => $this->input->post('upc_code'),
				'sku_code' => $this->input->post('sku_code'),
				'product_stock' => $this->input->post('product_stock')
				);
		
		$this->db->select('*');
	 	$this->db->where('product_id', $id);
	 	$this->db->delete('products', $data);
	 	return $id;
	}

	public function reviews($review)
	{
	 	$this->db->insert('product_reviews', $review);
	 	$id = $this->db->insert_id();
	 	return $id;
	}

	public function displayReviews()
	{
		$this->db->select('*');
		$this->db->from('product_reviews');
		$this->db->where('product', $reviews);
		
		$query = $this->db->get();
		return $query->result();
	}
}