<?php
    class Deactivate
    {

        private $conn;                                                             // Connection

        private $db_table = "users";                                            // Table

        public $id;                                                                // Columns
        public $deactivate;

        public function __construct($db)                                           // Db connection
        {
            $this->conn = $db;
        }

        public function updateDeactivate()
        {
            $sql = "UPDATE
                        users
                    SET
                        deactivate = :deactivate
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sql);
        
            $this->deactivate=htmlspecialchars(strip_tags($this->deactivate));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(":deactivate", $this->deactivate);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute())
            {
               return true;
            }

            return false;
        }

    }

?>

