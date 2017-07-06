<?php
/**
 * Created by PhpStorm.
 * User: psybo-03
 * Date: 5/7/17
 * Time: 11:05 AM
 */
defined('BASEPATH') or exit('No direct script access allowed');

class portfolio_file_model extends MY_Model
{
//    public $table = 'portfolio_files';
    public $primary_key = 'id';

    public function __construct()
    {
        $this->has_many['portfolio'] = ['foreign_model' => 'Portfolio_model', 'foreign_table' => 'portfolios', 'foreign_key' => 'id', 'local_key' => 'portfolio_id'];
        $this->has_one['file'] = ['foreign_model' => 'File_model', 'foreign_table' => 'files', 'foreign_key' => 'id', 'local_key' => 'file_id'];
        parent::__construct();
        $this->timestamps = FALSE;
    }

    public function select($limit="", $order="")
    {
        $this->db->from('portfolios');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($order != null) {
            $this->db->order_by('id', 'DESC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $portfolio = $query->result();
            foreach ($portfolio as $value) {
                $this->db->from('portfolio_files');
                $this->db->where('portfolio_id', $value->id);
                $query1 = $this->db->get();
                $portfolio_files = $query1->result();
                foreach ($portfolio_files as $val) {
                    $this->db->from('files');
                    $this->db->where('id', $val->file_id);
                    $files_query = $this->db->get();
                    $files = $files_query->result();
                    foreach ($files as $file) {
                        $val->file_name = $file->file_name;
                        $val->file_type = $file->file_type;
                        $val->portfolio_file_id = $val->id;
                        $val->thumbImgUrl = public_url() . 'uploads/thumb/thumb_' . $file->file_name;
                        $val->imgUrl = public_url() . 'uploads/' . $file->file_name;
                    }
                }

                $value->file = $portfolio_files;
            }
            return $portfolio;
        }else
            return FALSE;
    }
}