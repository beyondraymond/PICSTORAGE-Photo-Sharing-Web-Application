<?php

class Form_model extends CI_Model{

   public function validateUser($loginCredentialArr){
        $query = $this->db->get_where('user', $loginCredentialArr)->result_array();
        $userPresent = empty($query) ? FALSE : TRUE;
        if($userPresent){
          $userVerified = $query[0]['verification_status'] == 0 ? FALSE : TRUE;
        }else{
          $userVerified = FALSE;
        }
        
        return [$userPresent, $userVerified];
   }

   public function getUserId($loginCredentialArr){
        $this->db->select('user_id');
        $this->db->from('user');
        $this->db->where($loginCredentialArr);
        $query = $this->db->get();
        return $query->result_array()[0]['user_id'];
   }

   public function addUser($registerCredentialsArr){
        $this->db->insert('user', $registerCredentialsArr);
   }

   public function changeVerificationStatus($verificationCode){
        $this->db->where('verification_code', $verificationCode);
        $this->db->update('user', ['verification_status' => 1]);
   }
}
?>