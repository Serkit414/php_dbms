<?php

/**
 * User
 * 
 * A person or entity that can log in to the site
 */
class User {

    /**
     * Unique identifier
     * @var integer
     */
    public $user_id;

    /**
     * The user's first name
     * @var string
     */
    public $first_name;

    /**
     * The user's last name
     * @var string
     */
    public $last_name;

    /**
     * The user's email address
     * @var string
     */
    public $email;

    /**
     * The user's username
     * @var string
     */
    public $username;

    /**
     * The user's password
     * @var string
     */
    public $user_password;

    /**
     * Validation errors
     * @var array
     */
    public $errors = [];

    /**
     * Authenticate a user by username and password
     * 
     * @param object $conn Connection to the database
     * @param string $username username
     * @param string $password password
     * 
     * @return boolean True if the credentials are correct, null otherwise
     */
    public static function authenticate($conn, $username, $user_password) {
        
        $sql = "SELECT *
                FROM user
                WHERE username = :username";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

        $stmt->execute();
        
        if ($user = $stmt->fetch()) {
            return $user->user_password == $user_password;
            }
    }

    /**
     * Validate the properties, putting any validation error messages in the $errors property
     *
     * @return boolean True if the current properties are valid, false otherwise
     */
    protected function validate()
    {
        if ($this->first_name == '') {
            $this->errors[] = 'First name is required';
        }
        if ($this->last_name == '') {
            $this->errors[] = 'Last name is required';
        }
        if ($this->email == '') {
            $this->errors[] = 'Email is required';
        }
        if ($this->username == '') {
            $this->errors[] = 'Username is required';
        }
        if ($this->user_password == '') {
            $this->errors[] = 'Password is required';
        }

        return empty($this->errors);
    }

    /**
     * Insert a new user with certain values
     * 
     * @param object $conn Connection to the database
     * 
     * @return boolean True if the insert was successful, false otherwise
     */

     public function create($conn) {
         if ($this->validate()) {

            $sql = "INSERT INTO user (username, user_password, first_name, last_name, email, user_type)
                    VALUES (:username, :user_password, :first_name, :last_name, :email, user_type)";

            $stmt = $conn->prepare($sql);           

            $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
            $stmt->bindValue(':user_password', $this->user_password, PDO::PARAM_STR);
            $stmt->bindValue(':first_name', $this->first_name, PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $this->last_name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->user_id = $conn->lastInsertId();
                return true;
            }

        } else {
            return false;
        }
     }

     /**
      * Get all the users
      * 
      * @param object $conn Connection to the database
      *
      * @return array an associative array of all the user records
      */

      public static function getAll($conn) {

        $sql = "SELECT * FROM user;";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
      }

      /**
       * Get the user record based on the ID
       * 
       * @param object $conn Connection to the database
       * @param integer $user_id the users ID
       * 
       * @return mixed an object of this class or null if not found
       */

       public static function getByID($conn, $user_id, $columns = '*') {
           $sql = "SELECT $columns
                    FROM user
                    WHERE user_id = :user_id";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

            if ($stmt->execute()) {

                return $stmt->fetch();

       }
    }
}