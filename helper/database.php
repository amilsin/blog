<?
/*
* Class to handle database connections
*/

class database {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = 'pass';
    private $database = 'blog';
    public $connection;

/*
* constructor function to connect Database
*/
    public function __construct() {
        $host = mysqli_connect($this->hostname, $this->username, $this->password);
        if ($host) {
            $connection = mysqli_select_db($host, $this->database);
            if (!$connection) {
                die('An error occured while trying to connect to the database.');
            }
            $this->connection = $host;
        }
    }

/*
*  function getBlog - To get all blogs for listing
*  params id
*  returns result array or false
*/
    public function getBlog($id) {
        
        $query = "select id, title, author, content, created_time from blog_posts";
        if ($id) {
          $query.= " where id=".$id;  
        }
        
        if ($result = mysqli_query($this->connection, $query)) {
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $blogInfo[] = $row;
                }
                return $blogInfo;
            }
            else {
                return FALSE;
            }
            
        } else {  
            return "Error in connection";
        }
    }

/*
*  function insertBlog - To insert Blogs
*  params table name, form data
*  returns true or error
*/
    public function insertBlog($table, $data) {
        $query = "INSERT INTO ".$table." (";            
        $query .= implode(",", array_keys($data)) . ') VALUES (';
        $query .= "'" . implode("','", array_values($data)) . "')";  
        
        if(mysqli_query($this->connection, $query)) {  
            return true;  
        }  
        else {  
            return "Error in connection";
        }
    }
}

?>