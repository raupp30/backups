<?
    class ClientModel {

    var $connection;

    public function construct()
    {
      require_once('db/ConnectClass.php');
      $ConnectClass = new ConnectClass();
      $ConnectClass -> openConnect();
      $this -> connection = $ConnectClass -> getConn();
    }
    
    public function listClients() 
    {
      require_once('db/ConnectClass.php');
      $ConnectClass = new ConnectClass();
      $ConnectClass -> openConnect();
      $connection = $ConnectClass -> getConn();

      $sql = "SELECT * FROM clients";
      return $connection -> query($sql);
    }

    public function consultClient ($idClient)
    {
      require_once('db/ConnectClass.php');
      $ConnectClass = new ConnectClass();
      $ConnectClass -> openConnect();
      $connection = $ConnectClass -> getConn();

      $sql = "
      SELECT * FROM clients
      WHERE
        idClient = $idClient
      ";
      return $connection -> query($sql);
    }
  
    public function insertClient($arrayClient) 
    {
      require_once('db/ConnectClass.php');
      $ConnectClass = new ConnectClass();
      $ConnectClass -> openConnect();
      $connection = $ConnectClass -> getConn();
      
      $sql = "
      INSERT INTO
        clients (name, email, phone, address)
        VALUES
        (
        '{$arrayClient['name']}',
        '{$arrayClient['email']}',
        '{$arrayClient['phone']}',
        '{$arrayClient['address']}'
        )
        ";
        return $connection -> query($sql);
    }
    
    public function updateClient($idClient, $arrayClient)
    {
      require_once('db/ConnectClass.php');
      $ConnectClass = new ConnectClass();
      $ConnectClass -> openConnect();
      $connection = $ConnectClass -> getConn();

          $sql = "
          UPDATE clients
            SET 
              name = '{$arrayClient['name']}',
              email = '{$arrayClient['email']}',
              phone = '{$arrayClient['phone']}',
              address = '{$arrayClient['phone']}'
          WHERE
              idClient = {$idClient}
          ";
      
          return $connection -> query($sql);
    
    }
    public function deleteClient ($idClient)
    {
      require_once('db/ConnectClass.php');
      $ConnectClass = new ConnectClass();
      $ConnectClass -> openConnect();
      $connection = $ConnectClass -> getConn();
    
    $sql = "
    DELETE FROM clients
      WHERE
      idClient = {$idClient}
    ";
    return $connection -> query($sql);
  }

}
?>