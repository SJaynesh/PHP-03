<?PHP

class Config
{
    private $HOST = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB_NAME = "php-03";

    private $conn;

    public function initDB()
    {
        // return boolean value
        $this->conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);

        return $this->conn;
    }

    public function insertStudent($name, $age, $course)
    {
        $this->initDB();

        $query = "INSERT INTO students (name, age, course) VALUES ('$name', $age, '$course');";

        return mysqli_query($this->conn, $query); // retrun boolean value (true/false) 
    }

    public function fetchAllStudents()
    {
        $this->initDB();

        $query = "SELECT * FROM students";

        return mysqli_query($this->conn, $query); //  return object for mysqli_result class
    }

    public function deleteStudent($id)
    {
        $this->initDB();

        $query = "DELETE FROM students WHERE id=$id";

        return mysqli_query($this->conn, $query); // return bool.
    }

}

?>