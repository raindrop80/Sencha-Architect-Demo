<?php

class User extends CI_Model {

    var $id                   = 0;
    var $name                 = '';
    var $surname              = '';
    var $username             = '';
    var $password             = '';
    var $email                = '';
    
    /**
     * Conesente all'utente di effettuare il login e poter quindi
     * iniziare a consumare le REST api.
     * @param {String} username Username di autenticazione. 
     * @param {String} password Password di autenticazione.
     * @return {User/Boolean} Le informazioni complete associate all'utente
     * che ha effettuato il login in caso di autenticazione avvenuta
     * con successo, altrimenti false.
     */
    public function login($username, $password)
    {
	
	    // Definizione della query di reperimento info utente
		$sql = "SELECT *".
	           " FROM users".
	           " WHERE username = ?".
	           " AND password = ?";

        // Tentativo di reperimento delle informazioni associate all'utente che sta effettuando l'accesso
		$user = $this->db->query($sql, array($username, $password))->result();
		
		return $user ? $user[0] : false;

    }

}

/* End of file pet.php */
/* Location: ./application/models/user.php */