<?php

class User {
    private $index = '../index.php';
    protected $file = '../data.json';
    protected $user_data;
    
    public function setUserData($d)
    {
        foreach ($d as $k => $v) {
            $d[$k] = htmlspecialchars(trim($v),
                    ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5);
        }
        $this->user_data = $d;
        return $this;
    }
    
    protected function editFile($changes)
    {
        file_put_contents($this->file, $changes, FILE_APPEND | LOCK_EX);
    }
    
    protected function redirectUser()
    {
        header('Location: '.$this->index);
    }
}


