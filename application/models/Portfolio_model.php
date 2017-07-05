<?php
/**
 * Created by PhpStorm.
 * User: psybo-03
 * Date: 5/7/17
 * Time: 11:02 AM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Portfolio_model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }

}