<?php
    
	require_once "function.php";

  global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $success, $title, $body, $author, $file_err, $title_error,  $author_error, $body_error;

    global $db, $blog_rows,  $status, $id, $blog_row;

if(isset($_GET['success'])){
  $success = 'post updated successfully';
}                     

   
if(isset($_POST['blog'])){
    if(blog($_POST)){
        
    }
}
   
if(isset($_POST['blog_edit'])){
    if(update_blog($_POST)){
        
    }
}



if(isset($_POST['delete_blog'])){
    if(delete_blog($_POST)){
        
    }
}

display_blogs();
display_blog_edit();

   

?>



<?php 
      include "header.php";
      include "sidebar.php";
    ?>  


 <!--main content start-->
 <div class="container">
 <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Blog</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-9">
     <?php if(isset($_GET['id'])){ ?>
         
      <div class="recent">
              <h3>Home Page Settings</h3>
              <h3 class="text-center">Edit Blog Post</h3>
            </div>
            <span class="text-primary"><?= $success ?></span>
            <span class="text-primary"><?php  ?></span>
            <span class="text-danger"><?php  ?></span>
            <form action="blog.php?id=<?= $blog_row['id'] ?>" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="title" value="<?= $blog_row['title'] ?>" class="form-control" placeholder="Title"/>
              </div>
              <span class="text-danger"><?= $title_error ?></span>
            
              <div class="form-group">
                <input type="text" class="form-control" value="<?= $blog_row['author'] ?>" name="author" placeholder="Author" />
                <div class="validation"></div>
  <br>
              <div class="form-group">
                <input type="file" name="file">
              </div>
              <span class="text-danger"><?php ?></span>

              <div class="form-group">
                <textarea id="mytextarea" class="form-control"  rows="20" cols="200" name="body" placeholder="Enter Text Here...."><?= $blog_row['body'] ?></textarea>
                <div class="validation"></div>
              <span class="text-danger"><?= $body_error ?></span>
              </div>

              <div class="text-center"><button type="submit" name="blog_edit" class="btn btn-primary btn-lg">Add Post</button></div>
            </form>
          </div>

     <?php }else{ ?>
        
      <div class="recent">
              <h3>Home Page Settings</h3>
              <h3 class="text-center">Create Blog Post</h3>
            </div>
            <span class="text-primary"><?= $success ?></span>
            <span class="text-danger"><?php  ?></span>
            <form action="blog.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="title" value="<?= $title ?>" class="form-control" placeholder="Title"/>
              </div>
              <span class="text-danger"><?= $title_error ?></span>
            
              <div class="form-group">
                <input type="text" class="form-control" value="<?= $author ?>" name="author" placeholder="Author" />
                <div class="validation"></div>
  <br>
              <div class="form-group">
                <input type="file" name="file">
              </div>
              <span class="text-danger"><?php ?></span>

              <div class="form-group">
                <textarea id="mytextarea" class="form-control"  rows="20" cols="200" name="body" placeholder="Enter Text Here...."><?= $body ?></textarea>
                <div class="validation"></div>
              <span class="text-danger"><?= $body_error ?></span>
              </div>

              <div class="text-center"><button type="submit" name="blog" class="btn btn-primary btn-lg">Add Post</button></div>
            </form>
          </div>

     <?php } ?>

          <div class="col-lg-3">
            <div class="recent">
              <h3></h3>
            </div>
            <div class="">
     
            </div>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>


<div class="container">
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>Blog</h3>
              </header>
              <div class="table-responsive">
                <table class="table table-dark">
                  <thead>
                  <tr>
                 <th scope="col">SN</th>
                 <th>Title</th>
                   <th>Body</th>
                   <th>Author</th>
                   <th scope="col">Image</th>
                   <th>Created_at</th>
                   <th>Edit</th>
                   <th>Delete</th>
               </tr>
                  </thead>
                  <tbody>
          <?php if(is_array($blog_rows)){ ?>        
    <?php foreach($blog_rows as $row) {  ?>
                  
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td style="color: red;" ><?= $row['title'] ?></td>
      <td style="color: red;" ><?= $row['body'] ?></td>
      <td style="color: red;" ><?= $row['author'] ?></td>
      <td><img src="<?= $row['pic'] ?>" alt="" height="80px" width="80px"></td>
      <td style="color: red;" ><?= $row['created_at'] ?></td>

      <td>
         <a  class="text-primary" href="blog.php?id=<?= $row['id'] ?>"><button class="text-primary">Edit</button></a>
      </td>
      <td>
          <form action="blog.php?id=<?= $row['id'] ?>" method="POST">
              <button class="btn-danger" name="delete_blog">Delete</button>
          </form>
      </td>
    </tr>
    <?php } ?>
    <?php }else{ ?>
    <?php } ?>

  </tbody>
                </table>
              </div>

            </section>
          </div>
        </div>

</div>
 </div>
    <!--main content end-->
  




 <?php 
      include "footer.php";
    ?>  

</section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>

<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>