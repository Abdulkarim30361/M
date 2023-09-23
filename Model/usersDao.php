<?php 

    class UsersDao
    {
        private $connection;
        private $table = 'users';


        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function create($user)
        {
           // create query
           $query = 'INSERT INTO "'. $this->table.'" VALUES(:nom,:mail ,:role, :password)';
 
           // Preparing statement
           $stmt = $this->connection->prepare($query);

           // Binding data
           $stmt->bindParam(':nom', $user->getName());
           $stmt->bindParam(':mail', $user->getMail());
           $stmt->bindParam(':role', $user->getRole());
           $stmt->bindParam(':password', $user->getPassword());
           
           if($stmt->execute()) {

               return true;
             }

             // Print error if something goes wrong
             printf("Error: %s.\n", $stmt->error);

             return false;
               
       }

        public function read_single($user_id) {
            // Create query
            $query = 'SELECT *
                          FROM ' . $this->table . '
                          WHERE id = ?
                          LIMIT 0,1';
      
            // Prepare statement
            $stmt = $this->connection->prepare($query);
      
            // Bind user_id
            $stmt->bindParam(1, $user_id);
      
            // Execute query
            $stmt->execute();
      
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            return $row;
      
          }

        function getAll()
        {
            $sql = 'SELECT * FROM  "' . $this->table.'"';

            $stmt = $this->connection->prepare($sql);
            $result = $stmt->execute();

            $terre = $stmt->fetchAll(PDO::FETCH_OBJ); 

            $stmt->closeCursor();

            return $terre;
    }



          
    }
?>