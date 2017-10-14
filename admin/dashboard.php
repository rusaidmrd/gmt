<?php 
    require_once("inc/init.php");
    if(!$session->is_logged_in()) { redirect_to("login.php"); }
 ?>


<?php 
     // find all photos
    // $files=File::find_by_sql("SELECT * FROM files ORDER BY name DESC");
 ?>


<?php

   // pagination
 
  // 1. the current page number ($current_page)
    $page=!empty($_GET['page']) ? (int)$_GET['page'] : 1;

  // 2. records per page ($per_page)
    $per_page=10;

  // 3. total record count ($total_count)
    $total_count=File::count_all();


    $pagination=new Pagination($page, $per_page, $total_count);

     
  // instead of find all photos, just find the photos for this page
      $sql  ="SELECT * FROM files ";
      $sql .="ORDER BY id DESC ";
      $sql .="LIMIT {$per_page} ";
      $sql .="OFFSET {$pagination->offset()}";

      $files=File::find_by_sql($sql);

  // Need to add ?page=$page to all links we want to maintain the current page (or store $page in $session)

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- custome styles -->
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">


  </head>
  <body>
  
    <header>
        <div class="top">
            <div class="log-wrap">
                <a href="logout.php">logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>  
        </div><!-- end of top -->
    </header><!-- end of header -->

    <section class="table-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <h4>Check file details</h4>
                <div class="table-responsive"> 
                    <table id="mytable" class="table table-bordred table-striped">
                      <thead>
                        <!-- <th><input type="checkbox" id="checkall" /></th> -->
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Message</th>
                        <th>File</th>
                        <th>Date</th>
                        <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php foreach($files as $file):  ?>
                          <tr>
                            <!-- <td><input type="checkbox" class="checkthis" /></td> -->
                            <td><?php echo $file->name; ?></td>
                            <td><?php echo $file->email; ?></td>
                            <td><?php echo $file->phone_no; ?></td>
                            <td><?php echo $file->message; ?></td>
                            <td class="download"><a href="<?php echo $file->image_path(); ?>" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
                            <td><?php echo $file->dateAdded; ?></td>
                            <td class="trash"><a href="delete-file.php?id=<?php echo $file->id ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                          </tr>
                      <?php endforeach;  ?>
                
                      </tbody>
                                    
                    </table>
                    <div class="clearfix"></div>
                
              <?php if($pagination->total_pages() > 1) {?>
                    <ul class="pagination pull-right">
                      <!-- prev section of pagination -->
                      <?php if($pagination->has_prev_page()){ ?>
                      <li><a href="dashboard.php?page=<?php echo $pagination->prev_page(); ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                      <?php } ?>

                      <?php for($i=1; $i<=$pagination->total_pages(); $i++) { ?>
                      <li <?php if($i == $page){ echo "class=active"; } ?> ><a href="dashboard.php?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
                      <?php } ?>
                    
                      <!-- Next section of pagination -->
                    <?php if($pagination->has_next_page()){ ?>
                      <li><a href="dashboard.php?page=<?php echo $pagination->next_page(); ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                    <?php } ?>
                    </ul>
                                            
                </div><!-- end of table-responsive -->
              <?php } ?>
                        
              </div><!-- end of col -->
          </div><!-- end of row -->
      </div><!-- end of container -->
    </section>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
  </body>
</html>
