<?php

class Feed extends CI_Model {

    var $id    = 0;
    var $name  = '';
    var $url   = '';

    /**
     * Crea un nuovo feed che verrà associato all'utente
     * attualmente loggato.
     * @param {Array} feed Array contenente tutte le informazioni
     * relative al nuovo feed che dovrà essere creato.
     */
    public function create($feed){

		$sql = "INSERT INTO feeds (user_id, name, url)".
	           " VALUES (?, ?, ?)";

	    $success = $this->db->query($sql, $feed);
	    return $success ? $feed : false;    
	
	}
	
	/**
	 * Elimina il feed specificato assegato all'utente indicato.
	 * @param {Number} user_id Identificativo univoco dell'utente attualmente loggato.
	 * @param {Number} feed_id Identificativo univoco assegnato al feed da eliminare.
	 */
	public function delete($user_id, $feed_id){

		$sql = "DELETE FROM feeds WHERE user_id = ? AND id = ?";
	    $success = $this->db->query($sql, array($user_id, $feed_id));
	    return $success;    
	
	}
	
	/**
	 * Aggiorna il feed specificato con le nuove informazioni fornite.
	 * @param {Number} id Identificativo univoco assegnato al feed da eliminare.
	 * @param {String} name Il nuovo nome da assegnare al Feed.
     * @param {String} url Nuovo Url mediante il quale è possibile raggiungere il feed.
	 */
	public function update($id, $name, $url){

		$sql = "UPDATE feeds SET name = ?, url = ? WHERE id = ?";
	    $success = $this->db->query($sql, array($name, $url, $id));
	    return $success;    
	
	}

    /**
     * Reperisce la lista di tutti i feeds associati
     * all'utente che ha effettuato la connessione.
     * @param {Number} user_id Identificativo univoco assegnato all'utente attualmente loggato.
     */
    public function all($user_id){
	
		$sql = "SELECT * FROM feeds WHERE user_id = ?";
		$feeds = $this->db->query($sql, array($user_id))->result();
		return $feeds;

    }

}

/* End of file pet.php */
/* Location: ./application/models/feed.php */