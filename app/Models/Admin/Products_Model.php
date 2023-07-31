<?php


namespace App\Models\Admin;

use CodeIgniter\Model;

class Products_Model extends Model
{

    public $builder;    
    public $db; 
    public $data;   

    function __construct()
    {
        //Connecting Database
        $this->db = \Config\Database::connect();
        $this->data = array();
    }

    public function get_all_products()
    {
        $this->builder = $this->db->table('ut_products');
        $this->builder->select('*');
        $this->builder->orderBy('id' , 'DESC');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function get_product_by_id($id)
    {
        $this->builder = $this->db->table('ut_products');
        $this->builder->select('*');
        $this->builder->where('id' , $id);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function insert_product()
    {
        $this->builder = $this->db->table('ut_products');
        $query = $this->builder->insert($this->data);
        return $this->db->insertID();
    }

    public function update_product($id)
    {
        $this->builder = $this->db->table('ut_products');
        $this->builder->where('id', $id);
        $query = $this->builder->update($this->data);
        return $query;
    }

    public function delete_products($id)
    {
        $this->builder = $this->db->table( 'ut_products' );
        $this->builder->where( 'id', $id );
        $query = $this->builder->delete();
        return $query;
    }

}
?>    