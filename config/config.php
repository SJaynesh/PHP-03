<?PHP

class Config
{

    // FOREIGN KEY (column_name) REFERENCES table_name(column_name)
    private $HOST = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB_NAME = "php-03";
    private $conn;
    private $STUDENT_TABLE = "students";
    private $USERS_TABLE = "users";
    private $DEPARTMENT_TABLE = "department";
    private $MEMBER_TABLE = "members";
    private $MEDIA_TABLE = "media";

    public function initDB()
    {
        // return boolean value
        $this->conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);

        return $this->conn;
    }

    public function insertStudent($name, $age, $course)
    {
        $this->initDB();

        $query = "INSERT INTO $this->STUDENT_TABLE (name, age, course) VALUES ('$name', $age, '$course');";

        return mysqli_query($this->conn, $query); // retrun boolean value (true/false) 
    }

    public function fetchAllStudents()
    {
        $this->initDB();

        $query = "SELECT * FROM $this->STUDENT_TABLE";

        return mysqli_query($this->conn, $query); //  return object for mysqli_result class
    }

    public function deleteStudent($id)
    {
        $this->initDB();

        $result = $this->fetchSingleStudent($id);

        $single_student = mysqli_fetch_assoc($result);

        if ($single_student) {
            $query = "DELETE FROM $this->STUDENT_TABLE WHERE id=$id";

            return mysqli_query($this->conn, $query); // return bool.
        } else {
            return false;
        }
    }

    public function fetchSingleStudent($id)
    {
        $this->initDB();

        $query = "SELECT * FROM $this->STUDENT_TABLE WHERE id=$id";

        return mysqli_query($this->conn, $query); //  return object for mysqli_result class
    }

    public function updateStudent($name, $age, $course, $id)
    {
        $this->initDB();

        $result = $this->fetchSingleStudent($id);

        $single_student = mysqli_fetch_assoc($result);

        if ($single_student) {
            $query = "UPDATE $this->STUDENT_TABLE SET name='$name', age=$age, course='$course' WHERE id=$id";

            return mysqli_query($this->conn, $query); // return bool
        } else {
            return false;
        }
    }

    public function registerUser($name, $email, $password)
    {
        $this->initDB();

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO $this->USERS_TABLE (name, email, password) VALUES('$name', '$email', '$hashed_password');";

        return mysqli_query($this->conn, $query);
    }

    public function loginUser($email, $password)
    {
        $this->initDB();

        $query = "SELECT * FROM $this->USERS_TABLE WHERE email = '$email'";

        $res = mysqli_query($this->conn, $query);

        $result = mysqli_fetch_assoc($res);

        if ($result) {
            return password_verify($password, $result['password']);

        } else {
            return false;
        }
    }

    public function insertDepartment($name)
    {
        $this->initDB();

        $query = "INSERT INTO $this->DEPARTMENT_TABLE (name) VALUES ('$name');";

        return mysqli_query($this->conn, $query); // retrun boolean value (true/false) 
    }

    //     CREATE TABLE Department(
    // 	    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    //      name TEXT NOT NULL,
    //      department_id INTEGER,
    //      FOREIGN KEY (department_id) REFERENCES department(id) ON DELETE CASCADE
    // )
    public function insertMember($name, $id)
    {
        $this->initDB();

        $query = "INSERT INTO $this->MEMBER_TABLE (name, department_id) VALUES ('$name', $id);";

        return mysqli_query($this->conn, $query); // retrun boolean value (true/false) 
    }

    public function insertMedia($name)
    {
        $this->initDB();

        $query = "INSERT INTO $this->MEDIA_TABLE (name) VALUES ('$name');";

        return mysqli_query($this->conn, $query); // retrun boolean value (true/false) 
    }

    public function fetchSingleMedia($id)
    {
        $this->initDB();

        $query = "SELECT * FROM $this->MEDIA_TABLE WHERE id=$id";

        $media_data = mysqli_query($this->conn, $query); //  return object for mysqli_result class

        $result = mysqli_fetch_assoc($media_data);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function deleteMedia($id)
    {
        $this->initDB();

        $result = $this->fetchSingleMedia($id);

        if ($result) {
            $isDeleted = unlink("../../uploads/" . $result['name']);

            if ($isDeleted) {
                $query = "DELETE FROM $this->MEDIA_TABLE WHERE id=$id";

                return mysqli_query($this->conn, $query); // return bool.
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

?>