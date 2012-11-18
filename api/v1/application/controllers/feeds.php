<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Feeds extends REST_Controller {

    /**
     * Crea un nuovo Feed e lo associa all'utente che ha
     * effettuato il login.
     * I seguenti parametri vengono inviati tramite
     * operazione HTTP di POST:
     * @param {String} name Il nuovo nome da assegnare al Feed.
     * @param {String} url Nuovo Url mediante il quale è possibile raggiungere il feed.
     */
    public function new_post(){
    
        session_start();
        $this->load->model('Feed');
    
        $feed = $this->Feed->create(
            array(
                "user_id" => $_SESSION['user']->id,
                "name" => $this->post('name'),
                "url" => $this->post('url')
            )
        );

        if($feed){

            $this->response(
                array(
                    "success" => "true"
                ), 
                200
            );

        }
        else{
        
            $this->response(
                array(
                    "success" => "false"
                ), 
                403
            );

        }

    }

    /**
     * Aggiorna il feed indicato con le nuove
     * informazioni specificate.
     * I seguenti parametri vengono inviati tramite
     * operazione HTTP di PUT:
     * @param {Number} id Identificativo univoco assegnato al feed da modificare.
     * @param {String} name Il nuovo nome da assegnare al Feed.
     * @param {String} url Nuovo Url mediante il quale è possibile raggiungere il feed.
     */
    public function update_put(){

        $this->load->model('Feed');
        $success = $this->Feed->update($this->put('id'), $this->put('name'), $this->put('url'));
        $this->response(array("success" => $success), 200);

    }

    /**
     * Rimuove il feed al quale è stato impostato l'id specificato
     * associato all'utente che ha effettuato il login.
     * @param {Number} id Identificativo univoco assegnato al feed da eliminare.
     */
    public function remove_delete($id){
    
		session_start();
        $this->load->model('Feed');
        $success = $this->Feed->delete($_SESSION['user']->id, $id);
        $this->response(array("success" => $success), 200);

    }

    /**
     * Reperisce la lista di tutti i feeds associati
     * all'utente che ha effettuato la connessione.
     */
    public function all_get(){
    
        session_start();
        $this->load->model('Feed');
        $feeds = $this->Feed->all($_SESSION['user']->id);

        $this->response(
            array(
                "success" => "true",
                "total" => count($feeds),
                "data" => $feeds
            ), 
            200
        );
    
    }

}