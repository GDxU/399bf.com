<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);
class qxc_model extends model {
    public $table_name = '';
    public function __construct() {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'caipiaokong.com';
        $this->table_name = 'qxc';
        parent::__construct();
    }
}
?>