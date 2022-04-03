<?php

class UpdateUser extends User {
    
    public function updateFunc()
    {
        $new_file = file($this->file);
        if (is_array($new_file)) {
            foreach($new_file as $key => $value) {
                if(is_string(strstr($value, $_SESSION['username']))) {
                    $this->user_data['new_pass'] = md5($this->user_data['new_pass']);
                    $new_file[$key] = preg_replace($value, json_encode($this->user_data), $value);
                    $_SESSION['username'] = $this->user_data['new_name'];
                }
            }
        }
        $fp = fopen($this->file, "w+");
        fwrite($fp,implode("",$new_file));
        fclose($fp);
        $this->redirectUser();
    }
}
