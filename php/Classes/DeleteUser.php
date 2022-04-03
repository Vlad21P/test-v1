<?php

class DeleteUser extends User {
    
    public function deleteFunc()
    {
        if ($_SESSION['count_users'] != "") {
            $_SESSION['count_users']--;
            $del_file=file($this->file);
            $fp=fopen($this->file,"w");
            for($i=0;$i<sizeof($del_file);$i++) {
                if($i==$_SESSION['count_users']) {
                    unset($del_file[$i]);
                }
            }
            fputs($fp,implode("",$del_file));
            fclose($fp);
        }
        unset($_SESSION['username']);
        unset($this->user_data);
        $this->redirectUser();
    }
}

