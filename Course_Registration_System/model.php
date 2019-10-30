<?php
// Omar R. Gebril | model.php | Course Registration System
//session_start();
class CourseUser{
    private $DB; // The instance variable used in every method
    // Connect to an existing data based named 'first'
    private $username;
    private $password;
    private $courseCount;
    public function __construct() {
        $dataBase =
        'mysql:dbname=courses_final;charset=utf8;host=127.0.0.1';
        $user =
        'root';
        $password =
        '';
        try {
            $this->DB = new PDO ( $dataBase, $user, $password );
            $this->DB->setAttribute ( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            echo ('Error establishing Connection');
            exit ();
        }
    }
    public function findUsers ($username){
        $stmt = $this->DB->prepare( "SELECT * FROM users where username = '".$username."'");
        $stmt->execute ();
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
//         $stmt = $this->DB->prepare( "SELECT * FROM users where username = :username");
//         $stmt->bindParam(' :username', $username, PDO::PARAM_STR);
//         $stmt->execute ();
//         $arr = $stmt->fetchAll( PDO::FETCH_ASSOC );
        
//         if($arr != []){
//             return false;
//         }
        
    }
    public function getClasses($class){
        if($class=='nature'){
            $stmt = $this->DB->prepare( "SELECT courses.course_code, courses.course_name, descriptions.course_description FROM courses JOIN descriptions ON courses.course_code = descriptions.course_code where courses.course_code like '%AED%' or courses.course_code like '%ACBS%';");
            $stmt->execute ();
            return $stmt->fetchAll( PDO::FETCH_ASSOC );
        }
        else if($class=='tech'){
            $stmt = $this->DB->prepare( "SELECT courses.course_code, courses.course_name, descriptions.course_description FROM courses JOIN descriptions ON courses.course_code = descriptions.course_code where courses.course_code like '%CSC%' or courses.course_code like '%ECE%';");
            $stmt->execute ();
            return $stmt->fetchAll( PDO::FETCH_ASSOC );
        }
        else if($class=='health'){
            $stmt = $this->DB->prepare( "SELECT courses.course_code, courses.course_name, descriptions.course_description FROM courses JOIN descriptions ON courses.course_code = descriptions.course_code where courses.course_code like '%PHP%' or courses.course_code like '%PHPR%';");
            $stmt->execute ();
            return $stmt->fetchAll( PDO::FETCH_ASSOC );
        }
    }
    
    public function AddUser ($username, $password){
        $stmt = $this->DB->prepare( "insert into users (username, password) values ('".$username."', '".$password."');");
        $stmt->execute ();
    }
    public function enrollUser($username, $courses_array){
        $stmt = $this->DB->prepare( "insert into enrollments (username, enrolls) values ('".$username."', '".$courses_array."');");
        $stmt->execute ();
        $stmti = $this->DB->prepare( "SELECT * FROM enrollments where username = '".$username."'");
        $stmti->execute ();
        return $stmti->fetchAll( PDO::FETCH_ASSOC );
        
    }
}



?>