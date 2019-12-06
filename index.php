<?
    include 'helper/database.php';
    include 'helper/post.php';
    $db = new database();
    $bloglist = new post();
    $blogInfo = $bloglist->getblogInfo($db);
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
            <h1>My Blogs</h1>
        </div>
        <div class="col-sm-6 header-link">
            <a href="add.php">Add Blogs</a>
        </div>
    </div>

    <div class="blog-list-section row ">
        <? 
        if ($blogInfo) {
            foreach($blogInfo as $blog) { ?>
                <div class="col-sm-12 blog-list">
                    <div class="row">
                        <div class="col-sm-8 title"><a href="detail.php?id=<?=$blog['id']?>"> <?= $blog['title'] ?> </a></div>
                        <div class="col-sm-4 time"> <?= $blog['created_time'] ?> </div>
                    </div>

                    <div class="content"> <?= $blog['content'] ?> </div>
                    <div class="col-sm-12 author"> By <?= $blog['author'] ?> </div>
                </div>
        <?
            }
        }   
        ?>
    </div>
</div>


