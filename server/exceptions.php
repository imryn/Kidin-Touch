<?php

    require_once('db.php');

    class Exceptions{
        
        function __construct() {
            $db =  DB::getInstance();
            $this->db = $db->getConnection();
        }

        private function error(){
            echo json_encode((object) [
                'error'=>true
            ]);
        }


        function DetailsUpdate(){

            foreach( $_POST as $key => $value ) {
                $_POST[$key] = strip_tags($this->db->real_escape_string($value));
            }

            $values = "'{$_POST['observation']}','{$_POST['observationDate']}','{$_POST['SpecialRequests']}',
            {$_POST['kidId']},'{$_POST['fname']}','{$_POST['lastname']}'";
    
            $sql = "INSERT INTO exceptions (observation,observationDate,SpecialRequests,kidId,fname,lastname) VALUES($values)";
            $result =$this->db->query($sql);
            if($result){
             echo json_encode((object) [
                 'success'=>true
            ]);
          }
          else{
             $this->error();
           }
        }

        public function getAllExceptions(){
            $sql = "SELECT exceptions.observation, exceptions.observationDate,exceptions.fname,exceptions.lastname FROM exceptions WHERE exceptions.observationDate>={$_GET['startDate']}
            AND exceptions.observationDate<={$_GET['endDate']} AND exceptions.fname='{$_GET['kidFname']}' AND exceptions.lastname='{$_GET['kidLname']}'" ;
 
            $result =$this->db->query($sql); 
            if($result){
                $data= [];
                while($row = mysqli_fetch_array($result)){
                    array_push($data, (object) [
                        'first_name' => $row['fname'],
                        'last_name' => $row['lastname'],
                        'note' => $row['observation'],
                        'date' => $row['observationDate']
                    ]);  
                }
                echo json_encode((object) [
                    'data' => $data,
                    'success'=>true
                ]);
            }
            else{
                $this->error();
            }
          
        }   

        public function __destruct(){
            $this->db->close();
        }
      
    }

?>

    