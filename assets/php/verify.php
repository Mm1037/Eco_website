<?php

       function validate($data){
           
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
        

        function checkUsername($users, $username){
            
            $status = null;
            
                checkDuplicateUsername($users, $username) ? $status = "duplicated" : "open";
            
            return $status;
        }

        function checkDuplicateUsername($users, $username){
            
            $flag = false;

            foreach($users as $user){
                if($user["USERNAME"] === $username) 
                    $flag = true;
            
                if($flag)
                    break;
            }

            return $flag;
        }
        
        function getUsers($conn){
        
            $sql = "SELECT * FROM users";
            (mysqli_query($conn, $sql)) ? $result = mysqli_query($conn, $sql) : false;
            
        return $result;
        }   

