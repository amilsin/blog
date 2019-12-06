<?
    include 'helper/database.php';
    include 'helper/post.php';

    if (isset($_POST['addBlog'])) {
        $db = new database();
        $blogPost = new post();
        $status = $blogPost->insertPosts($db);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="header row">
        <div class="col-sm-6">
            <h1>Add Blogs</h1>
        </div>
        <div class="col-sm-6 header-link">
            <a href="index.php">Blogs</a>
        </div>
    </div>
    <div class="message-section">
        <?
         if (isset($_POST['addBlog']) && $status) { ?>

            <div class=" col-sm-12 message"> Blog Added Successfully. </div>
        <?
         }
        ?>
    </div>
    <div class="add-blog-section">
        <form action='add.php' method='post'>  

            <div class="row fields"> 
                <div class="col-sm-3 label">
                    <label>Title</label>
                </div>
                <div class="col-sm-9">
                    <input type='text' name='title' value=''>
                </div>
            </div>
            <div class="row fields">
                <div class="col-sm-3 label">
                    <label>Author</label>
                </div>
                <div class="col-sm-9">
                    <input type='text' name='author' value=''>
                </div>
            </div>

            <div class="row fields">
                <div class="col-sm-3 label">
                    <label>Content</label>
                </div>
                <div class="col-sm-9">
                    <textarea name='content' cols='60'></textarea>
                </div>
            </div>

            <div class="row fields">
                <div class="col-sm-4 label">
                    <input type='submit' name='addBlog' value='Submit'>
                </div>
            </div>
        </form>
    </div>
</div>


