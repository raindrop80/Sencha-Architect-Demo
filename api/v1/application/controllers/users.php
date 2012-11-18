<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller {
    
    /**
     * Permette all'utente che sta utilizzando l'applicazione
     * di effettuare il login.
     */
    public function login_post(){
        
        session_start();
        $this->load->model('User');
        $user = $this->User->login($this->post('username'), $this->post('password'));
        
        // Controlla se l'utente è stato trovato
        if($user){
            
            /* Memorizzazione dell'utente all'interno
             * di una variabile di sessione. */
            $_SESSION['user'] = $user;
            
            // Autenticazione avvenuta con successo
            $this->response(
                array(
                    "success" => "true",
                    "user" => $user
                ), 
                200
            );
    
        }
        else {
            
            // Autenticazione fallita
            $this->response(
                array(
                    "success" => "false"
                ), 
                401
            );
            
        }

    }
    
}