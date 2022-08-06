<?php
class ValidateLogin extends DB {
    function get($Username) {
        return $this->select("SELECT * FROM User WHERE Username = :Username", $Username);
    }
}
?>