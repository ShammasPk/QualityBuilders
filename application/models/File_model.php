<?php
/**
 * Created by PhpStorm.
 * User: psybo-03
 * Date: 1/7/17
 * Time: 3:10 PM
 */

defined('BASEPATH') or exit('No direct script access allowed');

class File_model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->timestamps = false;
        $this->has_one['portfolio_file'] = array('foreign_model'=>'Portfolio_file_model','foreign_table'=>'portfolio_files','foreign_key'=>'portfolio_id','local_key'=>'id');
    }
}
