<?php
class ValidateLogin extends DB {
    function get($UserID) {
        return $this->select("SELECT * FROM User WHERE UserID = :UserID", $UserID);
    }
}
?>