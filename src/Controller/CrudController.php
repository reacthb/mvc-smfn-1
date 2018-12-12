<?php

namespace App\Controller;

use App\Model\CrudManager;
//use function App\escape;
use Symfony\Component\HttpFoundation\Response;

//use const Home\MODEL;
//use const Home\VIEW;
//use const Home\CONTROLLER;
//require_once (MODEL . 'CrudManager.php');
//require SRC . 'common.php';

class CrudController {

    function create() {
        $ok = false;
        if (isset($_POST['submit'])) {
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $location = $_POST['location'];
            $ok = (new CrudManager)->create($firstName, $lastName, $email, $age, $location);
        }
        require(__DIR__ . '\..\..\templates\view\createView.php');
        return(new Response);
    }

    function read() {

        $result = false;
        $submitted = false;
        if (isset($_POST['submit'])) {
            $submitted = true;
            $location = $_POST['location'];
            $result = (new CrudManager)->read($location);
        }
        require(__DIR__ . '\..\..\templates\view\readView.php');
        return(new Response);
    }

    function update() {
        $result = (new CrudManager)->update();
        require(__DIR__ . '\..\..\templates\view\updateView.php');
        return(new Response);
    }

    function updateSingle($id) {
        $crudManager = new CrudManager;
        $submitted = false;
        $user = $crudManager->getUser($id);

        if (isset($_POST['submit'])) {
            $submitted = true;
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $location = $_POST['location'];
            $date = $_POST['date'];
            $ok = $crudManager->updateSingle($id, $firstName, $lastName, $email, $age, $location, $date);
        }
        require(__DIR__ . '\..\..\templates\view\updateSingleView.php');

        return(new Response);
    }

    function delete() {
        $crudManager = new CrudManager;

        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        } else {
            $id = 0;
        }
        $resTab = $crudManager->delete($id);
        $success = $resTab[0];
        $result = $resTab[1];

        require(__DIR__ . '\..\..\templates\view\deleteView.php');
        return(new Response);
    }

}
