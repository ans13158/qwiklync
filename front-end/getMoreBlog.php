<?php
session_start();

$id="";
    require_once "connection.php";
$id = $_GET['id'];
$start = $_GET['start'];
$id = $id - $start;
//echo $start;


$sql="SELECT * FROM `blog` WHERE `blogId` <'$id' ORDER BY `blogId`  DESC LIMIT 4 ";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['blogId'];
                                    $title = $row['title'];
                                    $content = $row['content'];
                                    $photPath = $row['photoPath'];
                                    $photoName = $row['photoName'];
                                    $photo = $photoPath . "/" . $photoName  ;
                                    $date = $row['date'];
                                    $category = $row['category'];

                                    /*Count comments for this blog*/
                                    $countQuery = "SELECT COUNT(`commentId`) FROM `blogcomment` WHERE `blogId`='$id' ";
                                    $countComment = $conn->query($countQuery);
                                    $count = mysqli_fetch_array($countComment);
?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="fullBlog.php?blogId=<?php echo $id;?>&category=<?php echo $category;?>">

                                                <img src="<?php echo $photoVariable ;?>" alt="<?php echo $title;?>" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="fullBlog.php?blogId=<?php echo $id;?>&category=<?php echo $category;?>"><?php echo $date;?></a>
                                            <a href="#"><?php echo $count[0];?> comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="fullBlog.php?blogId=<?php echo $id;?>&category=<?php echo $category;?>">
                                    <?php echo $title;?>
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            <?php echo $content;?>
                                        </p>
                                    </div>
                                </div>
                               
<?php



    
}










mysqli_close($conn);
?>
