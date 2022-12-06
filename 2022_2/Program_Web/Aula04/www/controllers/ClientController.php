<?php


class ClientController{

    public function index(){


    }

    public function register (){
        require_once('views/templates/header.php');
        require_once('views/client/register.php');
        require_once('views/templates/footer.php');
    }

    public function registerView(){
        if(isset($_POST['accept'])){
            $accept = true;
            $acceptView = "Termo aceito.";
        }else{
            $accept = false;
            $acceptView = "Termo não aceito";
        }

        $arrayClient = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'] , 
            'phone' => $_POST['phone'],
            'gender' => $_POST['gender'],
            'accept' => $accept,
            'acceptView' => $acceptView
        );

        require_once('views/templates/header.php');
        require_once('views/client/registerView.php');
        require_once('views/templates/footer.php');
        

    }
}
?>