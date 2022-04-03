<?php

class CreateUser extends User {
    
    public function setUserData1($d)
    {
        foreach ($d as $k => $v) {
            $d[$k] = htmlspecialchars(trim($v),
                        ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5);
        }
        $this->user_data = $d;
        return $this;
    }
    
    public function createFunc()
    {
        $users = file($this->file);
        if($users != false) {
            foreach ($users as $t) {
                if (strpos($t, $this->user_data['login']) == false &&
                    strpos($t, $this->user_data['email']) == false) {
                    $this->preCreate();
                }
            }
        } else {
            $this->preCreate();
        }
    }

    private function preCreate()
    {
        $this->user_data['pass'] = md5($this->user_data['pass']);
        $this->user_data['confirm_pass'] = md5($this->user_data['confirm_pass']);
        $this->editFile(json_encode($this->user_data));
        $this->redirectUser();
    }
}

