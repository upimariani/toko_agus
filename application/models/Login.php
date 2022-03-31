<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Model
{

    public function auth($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
}
                        
/* End of file Login.php */
