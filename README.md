#Sencha Architect Demo App

Simple Sencha Touch 2.1.0 Feeds Reader application developed with Sencha Architect.

##Database

The REST Api make use of a simple MySQL database which sql creation script is located under the "database" folder of this project.
Please be sure to create the database before to start using the application.

##Rest API

In order to let the Rest API to connect to the application database, you need to edit the following CodeIgniter database configurations inside the **database.php** script located under the folder "api/v1/application/config".

    $db['local']['hostname'] = 'localhost';
    $db['local']['username'] = 'root';
    $db['local']['password'] = 'root';
    $db['local']['database'] = 'RSSReader';
    $db['local']['port'] = 3306;

##Contributors

    Andrea Cammarata