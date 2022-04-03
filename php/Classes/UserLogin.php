<?php

class UserLogin extends User {
    private int $count = 0;
    
    private function counterFunc() : int
    {
        $this->count = count(file($this->file));
        return $this->count;
    }
    
    public function loginFunc() 
    {
        foreach (file($this->file) as $string) {
            if((is_string(strstr($string, md5($this->user_data['auth_pass'])))
                && is_string(strstr($string, $this->user_data['auth_login'])))) {
                $json = json_decode($string, true);
                $_SESSION['username'] = $json['name'];
            } 
        }
        $_SESSION['count_users'] = $this->counterFunc();
        $this->redirectUser();
    }
}

