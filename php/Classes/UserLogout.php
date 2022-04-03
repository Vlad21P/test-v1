<?php

class UserLogout extends User {

    public function logoutFunc()
    {
        unset($_SESSION['username']);
        unset($this->user_data);
        $this->redirectUser();
    }
}
