/*
 * File: app/view/Login.js
 *
 * This file was generated by Sencha Architect version 2.1.0.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Sencha Touch 2.1.x library, under independent license.
 * License of Sencha Architect does not include license for Sencha Touch 2.1.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('RSS.view.Login', {
    extend: 'Ext.form.Panel',
    alias: 'widget.loginview',

    config: {
        title: 'Login',
        items: [
            {
                xtype: 'fieldset',
                instructions: 'Inserisci i parametri di autenticazione, quindi premi il pulsante "Login" per autenticarti.\' 	•	Aggiungere I due campi username e password',
                title: 'Autenticazione',
                items: [
                    {
                        xtype: 'textfield',
                        label: 'Username',
                        name: 'username'
                    },
                    {
                        xtype: 'passwordfield',
                        label: 'Password',
                        name: 'password'
                    }
                ]
            },
            {
                xtype: 'button',
                action: 'login',
                height: 50,
                ui: 'action',
                text: 'Login'
            }
        ]
    }

});