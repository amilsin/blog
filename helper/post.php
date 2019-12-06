<?
/*
* Class to handle Blog Posts
*/
class post {
    var $title = null;
    var $content = null;
    var $creation_date = null;
    var $author = null;

/*
* function getblogInfo
*  params - database connection
*  returns- result set of blogs from database
*/  
    public function getblogInfo($db) {

        $result = $db->getBlog(false);
        return $result;
    }

/*
* function getblogDetail
*  params - database connection
*  returns- result set of individual blog from database
*/ 
    public function getblogDetail($db) {
        $id = trim($_REQUEST['id']);
        $result = $db->getBlog($id);
        return $result;
    }

/*
* function insertPosts - to insert blog in to database
*  params - database connection
*  returns- true on sucessful insert.
*/ 
    public function insertPosts($db) {

        $insertBlogData = array (  
            'title' => mysqli_real_escape_string($db->connection, $_POST['title']),  
            'author'  => mysqli_real_escape_string($db->connection, $_POST['author']),
            'content'  => mysqli_real_escape_string($db->connection, $_POST['content']),
            'created_time' => date('Y-m-d : h:m:s')
        );

       if($db->insertBlog('blog_posts', $insertBlogData))  
       {  
           return TRUE;  
       }
       
    }
}
?>