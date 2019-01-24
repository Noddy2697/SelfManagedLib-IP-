<?php
session_start();
if(!isset($_SESSION["username"]))
{
?>
<script type="text/javascript">
window.location="login.php";
</script>
<?php	
}
  include"header.php" ;
  include"connection.php" ;
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>HELLO</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Display books AND search books</h2>
								

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							<form name="form1" action=" " method="post" >
							 <input type="text" name="t1" class="form-control" placeholder="enter book name"> 
							  <br> 
							 <input type="submit" name="submit1" value="search books" class="btn btn-success">
							 
                             </form>							 
                                <?php 
								if(isset($_POST["submit1"]))
								{  $res=mysqli_query($link,"select * from add_books ") ;
								echo  "<table class='table table-bordered'>" ;
								echo "<tr>"  ;
								echo "<th>" ; echo "books name" ; echo "</th>" ;
								echo "<th>" ; echo "books image" ; echo "</th>" ;
								echo "<th>" ; echo "author name" ; echo "</th>" ;
								echo "<th>" ; echo "publication name" ; echo "</th>" ;
								echo "<th>" ; echo "purchase date" ; echo "</th>" ;
								echo "<th>" ; echo "books price" ; echo "</th>" ;
								echo "<th>" ; echo "books quantity" ; echo "</th>" ;
								echo "<th>" ; echo "available quantity" ; echo "</th>" ;
								echo "<th>" ; echo "delete books" ; echo "</th>" ;
								 echo "</tr>" ;
								
						    while($row= mysqli_fetch_array($res))
							{ 
								if($row["book_year_id"]==$_POST['t1'])
							{  echo "<tr>" ; 
						    echo "<th>" ; echo $row["books_name"] ; echo "</td>" ;
							echo "<td>" ;?> <img src="<?php echo $row["books_image"] ; ?>" height="100" width="100"> <?php  echo "</td>" ;
								echo "<td>" ; echo $row["books_author_name"]  ; echo "</td>" ;
								echo "<td>" ; echo $row["books_publication_name"]  ; echo "</td>" ;
								echo "<td>" ; echo $row["books_purchase_date"] ;echo "</td>" ;
								echo "<td>" ; echo $row["books_price"] ; echo "</td>" ;
								echo "<td>" ; echo $row["books_qty"] ; echo "</td>" ;
								echo "<td>" ; echo $row["available_qty"]  ; echo "</td>" ;
								echo "<td>" ; 
                                ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Books </a> <?php
								echo "</td>" ;
								echo "</tr>" ;	
								}
								echo "</table>" ;
									
								}
								}
								?>
							   
							   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
		<?php 
		   include "footer.php" ;
		   ?>

