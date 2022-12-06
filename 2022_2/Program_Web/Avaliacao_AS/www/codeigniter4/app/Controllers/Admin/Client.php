<?php

namespace App\Controllers\Admin;

use App\Models\ClientModel;

use App\Controllers\BaseController;

class Client extends BaseController {

    public function listClients(){
        $ClientModel = new ClientModel();
        $data =[
            'arrayClients' => $ClientModel -> findAll()
        ];
        echo view('admin/templates/header');
        echo view('admin/client/listClients', $data);
        echo view('admin/templates/footer');
    }

    public function insertClient(){
        echo view('admin/templates/header');
        echo view('admin/client/insertClient');
        echo view('admin/templates/footer');
    }

    public function insertClientAction(){
        $data = [
            'name'=>$this -> request -> getVar('name'),
            'email'=>$this -> request -> getVar('email'),
            'phone'=>$this -> request -> getVar('phone'),
            'address'=>$this -> request -> getVar('address')
        ];

        $ClientModel = new ClientModel();
        $ClientModel -> insert($data);
        return redirect()->to(base_url('admin/listClients'));
    }

    public function updateClient($idClient){
            $ClientModel = new ClientModel();
            $data =[
                'arrayClient' => $ClientModel -> find($idClient)
            ]; 
        echo view('admin/templates/header');
        echo view('admin/client/updateClient', $data);
        echo view('admin/templates/footer');
    }

    public function updateClientAction($idClient){
       $data = [
            'name'    =>    $this -> request -> getVar('name'),
            'email'   =>   $this -> request -> getVar('email'),
            'phone'   =>   $this -> request -> getVar('phone'),
            'address' => $this -> request -> getVar('address')
        ];

        $ClientModel = new ClientModel();
        $ClientModel -> update($idClient, $data);
        return redirect()->to(base_url('admin/listClients'));
    }
    
    public function deleteClient($idClient){
        $ClientModel = new ClientModel();
        $ClientModel -> delete($idClient);
    return redirect()->to(base_url('admin/listClients'));
}

    public function  searchClient(){
        $ClientModel = new ClientModel();
        $data =[
            'arrayClients' => $ClientModel -> getClientsFor( $this -> request -> getVar('search'))
        ];
        echo view('admin/templates/header');
        echo view('admin/client/listClients', $data);
        echo view('admin/templates/footer');
    }


}