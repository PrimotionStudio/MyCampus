<?php
require_once "required/session.php";
require_once "required/sql.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
const PAGE_TITLE = "Home";
include_once "includes/head.php";
include_once "includes/alert.php";


// Register Submission Form Handler
require_once "func/register.php";

// $startid = 0;
// $stopid = 20;
// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     if (isset($_GET["postid"])) {
//         $postid = $_GET["postid"];
//         unset($_GET["postid"]);

        // This was already commented
        // if (isset($_SESSION["userid"]) && isset($_SESSION["username"])) {
        //     $con = mysqli_connect("localhost", "root", "", "mycampus");
        //     $userid = $_SESSION["userid"];
        //     $username = $_SESSION["username"];
        //     $selectuser = "SELECT * FROM userdetails WHERE id='$userid' && username='$username'";
        //     $queryuser = mysqli_query($con, $selectuser);
        //     $numuser = mysqli_num_rows($queryuser);
        //     if ($numuser == 1) {
        //         openpost($postid);
        //     } else {
        //         header("location: sharepost.php?postid=$postid");
        //     }
        // } else {
        //     header("location: sharepost.php?postid=$postid");
        // }
        // This was already commented\
//     } elseif (isset($_GET["startid"]) && isset($_GET["stopid"])) {
//         $startid = $_GET["startid"];
//         $stopid = $_GET["stopid"];
//         unset($_GET["startid"]);
//         unset($_GET["stopid"]);
//     }
// }
?>

<body class="<?php echo $getpref["color_theme"]." ".$getpref["dark_mode"]; ?> mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include "html_includes/navigation_top.php"; ?>
        <!-- navigation top -->

        <!-- navigation left -->
        <?php include "html_includes/navigation_left.php"; ?>
        <!-- navigation left -->
        
        <!-- main content -->

        <div class="main-content <?php echo $getpref["menu_pos"]; ?> right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">

                    <!-- loader wrapper -->
                    <?php include "html_includes/loader_wrapper.php"; ?>
                    <!-- loader wrapper -->

                    <div class="row feed-body">

                        <!-- Start Main area -->
                        <div class="col-xl-8 col-xxl-9 col-lg-8">
                            <div class="card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3" onclick="document.getElementById('compose').style.display='block'">
                                <div class="card-body p-0">
                                    <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Create Post</a>
                                </div>
                                <div class="card-body p-0 mt-3 position-relative">
                                    <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="<?php echo "profile/".$getuser["profilepic"]; ?>" style="height:30px; object-fit:cover" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                    <textarea name="message" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?" style="resize:none"></textarea>
                                </div>
                                <div class="card-body d-flex p-0 mt-0">
                                    <a href="#" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs">Photo/Video</span></a>
                                </div>
                            </div>


                            <div id="compose" class="w3-modal" style="top: 70px !important">
                                <div class="w3-modal-content w3-animate-zoom" style="background-color: rgb(0,0,0,0) !important">
                                    <div class="card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
                                        <div class="modal-header">
                                            <h2 class="modal-title align-center text-grey-500 fw-600"><b><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2"></i>Create Post</b></h2>
                                            <button type="button" class="btn-close" onclick="document.getElementById('compose').style.display='none'"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="compose.php" method="post" enctype="multipart/form-data">
                                                <div class="card-body p-0 mt-3 position-relative">
                                                    <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="<?php echo "profile/".$getuser["profilepic"]; ?>" style="height:30px; object-fit:cover" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                                    <textarea name="message" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?" style="resize:none"></textarea>
                                                </div>
                                                <div class="card-body d-flex p-0 mt-0">
                                                    <a id="mediaUpld" style="cursor:pointer" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs">Photo/Video</span><span class="d-none-xs" id="filetxt" style="padding-left:5px;"></span></a>
                                                    <input id="upld" type="file" name="mediafile[]" multiple onchange="filename()" style="display:none"/>
                                                    <span class="d-flex">
                                                        <button type="submit" class="btn btn-primary ms-auto text-light" style="border-radius:5px; padding:5px; float:right !important">Send <i class="feather-send text-light"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script type="text/JavaScript" src="js/jquery.min.js"></script>
                            <script>
                            $(function() {
                            $('#mediaUpld').on('click', function() {
                                $('#upld').trigger('click');
                            });
                            });
                            function filename() {
                                document.getElementById("filetxt").innerHTML = document.getElementById("upld").value;
                            }
                            </script>



                            
                            <?php
                            // This is where a modal for sharing/shared posts (url located posts) is suppose to be
                            $selectupd="SELECT * FROM news ORDER BY id DESC LIMIT $startid, $stopid";
                            $queryupd = mysqli_query($con, $selectupd);
                            $num_o_rows = mysqli_num_rows($queryupd);
                            ?>
                            <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                    <div class="d-flex justify-content-between stage">
                                        <?php
                                        if ($startid >= 20) {
                                            $new_startid = $startid - 20;
                                            $new_stopid = 20;
                                            echo "
                                            <form action='' method='get' style=''>
                                            <input type='hidden' name='startid' value='$new_startid'>
                                            <input type='hidden' name='stopid' value='$new_stopid'>
                                            <button style='height:40px;width:40px;border-radius:50%;float:left !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-left text-white'></span></button>
                                            </form>";
                                        }
                                        ?>
                                        <?php
                                        if ($num_o_rows > 0) {
                                            $new_startid = $startid + 20;
                                            $new_stopid = 20;
                                            echo "
                                            <form action='' method='get' style=''>
                                            <input type='hidden' name='startid' value='$new_startid'>
                                            <input type='hidden' name='stopid' value='$new_stopid'>
                                            <button style='height:40px;width:40px;border-radius:50%;float:right !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-right text-white'></span></button>
                                            </form>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php

                            while ($getupd = mysqli_fetch_assoc($queryupd)) {
                                $likes = str_word_count($getupd["likes"]);
                                if (stristr($getupd["likes"], " ".$username." ")) {
                                $displaylike = "Unlike";
                                } else {
                                $displaylike = "Like";
                                }
                                $dislikes = str_word_count($getupd["dislikes"]);
                                if (stristr($getupd["dislikes"], " ".$username." ")) {
                                $displaydis = "Revert";
                                } else {
                                $displaydis = "Dislike";
                                }
                                $getid = $getupd["posterid"];
                                $selectposter = "SELECT * FROM userdetails WHERE id='$getid'";
                                $queryposter = mysqli_query($con, $selectposter);
                                $getposter = mysqli_fetch_assoc($queryposter);

                                if ($getupd["postmedia"] == "") {
                                    echo "
                                    <div id='".$getupd["id"]."' class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                        <div class='card-body p-0 d-flex'>
                                            <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                <figure class='avatar me-3'><img src='profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer;' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                            </form>

                                            <h4 class='fw-700 text-grey-900 font-xssss mt-1'>".$getposter["firstname"]." ".$getposter["lastname"]." <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                        </div>
                                        <div class='card-body p-0 me-lg-5'>
                                            <p class='fw-500 text-grey-500 lh-26 font-xssss w-100 mt-2'>";
                                            if (strlen($getupd["post"]) > 200) {
                                                echo substr($getupd["post"],0,200)."...<a onclick=\"document.getElementById('seefull".$getupd["id"]."').style.display='block'\" style='cursor:pointer' class='fw-600 text-primary ms-2'>See more</a>";
                                            } else {
                                                echo $getupd["post"];
                                            }
                                            echo "</p>
                                        </div>
                                        <div class='card-body d-flex p-0 mt-3'>
                                            <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $displaylike</a>
                                            <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                            <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                        </div>
                                    </div>
                                    ";
                                    
                                    echo "
                                    <div id='seefull".$getupd["id"]."' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                        <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                            <div class='card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3'>
                                            
                                                <div class='modal-header'>
                                                    <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                        <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                        <figure class='avatar me-3'><img src='profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                    </form>
                                                    <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                    <button type='button' class='btn-close' onclick=\"document.getElementById('seefull".$getupd["id"]."').style.display='none'\"></button>
                                                </div>
                                                <div class='modal-body me-lg-5 mb-0'>
                                                    <p class='fw-500 text-grey-500 lh-26 font-xssss w-100 text-break'>".$getupd["post"]."</p>
                                                </div>
                                                <div class='modal-footer text-center'>
                                                    <div class='card-body d-flex p-0 mt-3'>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $displaylike</a>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                    </div>
            
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                } else {
                                echo "
                                <div id='".$getupd["id"]."' class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                    <div class='card-body p-0 d-flex'>
                                        <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                            <input type='hidden' name='username' value='".$getposter["username"]."'>
                                            <figure class='avatar me-3'><img src='profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                        </form>

                                        <h4 class='fw-700 text-grey-900 font-xssss mt-1'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                    </div>
    
                                    <div class='card-body p-0 me-lg-5'>
                                        <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>";
                                        if (strlen($getupd["post"]) > 200) {
                                            echo substr($getupd["post"],0,200)."...<a onclick=\"document.getElementById('seefull".$getupd["id"]."').style.display='block'\" style='cursor:pointer' class='fw-600 text-primary ms-2'>See more</a>";
                                        } else {
                                            echo $getupd["post"];
                                        }
                                        
                                    echo "
                                    <div id='seefull".$getupd["id"]."' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                        <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                            <div class='card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3'>
                                            
                                                <div class='modal-header'>
                                                    <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                        <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                        <figure class='avatar me-3'><img src='profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                    </form>
                                                    <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                    <button type='button' class='btn-close' onclick=\"document.getElementById('seefull".$getupd["id"]."').style.display='none'\"></button>
                                                </div>
                                                <div class='modal-body me-lg-5 mb-0'>
                                                    <p class='fw-500 text-grey-500 lh-26 font-xssss w-100 text-break'>".$getupd["post"]."</p>
                                                </div>
                                                <div class='modal-footer text-center'>
                                                    <div class='card-body d-flex p-0 mt-3'>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $displaylike</a>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                    </div>
            
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                        echo "</p>
                                    </div>
                                    <div class='card-body d-block p-0'>
                                        <div class='row ps-2 pe-2 text-center'>";
                                        if (strstr($getupd["postmedia"], " <joinpostmedia/> ")) {
                                            $postmedia = $getupd["postmedia"];
                                            $arromed = explode(" <joinpostmedia/> ", $postmedia);
                                            foreach ($arromed as $key => $value) {
                                                $dot = explode('.',$value);
                                                $file_ext=strtolower(end($dot));
                                                if (($file_ext == "jpg") || ($file_ext == "png") || ($file_ext == "jpeg")) {
                                                    echo "<div onclick=\"document.getElementById('seefull$value').style.display='block'\" class='col-xs-4 col-sm-4 p-1'><img src='$value' class='rounded-3 w-100' alt='image'></div>";

                                                    echo "
                                                    <div id='seefull$value' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                                        <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                                            <div class='card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3'>
                                                            
                                                                <div class='modal-header'>
                                                                    <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                                        <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                                        <figure class='avatar me-3'><img src='profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                                    </form>
                                                                    <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                                    <button type='button' class='btn-close' onclick=\"document.getElementById('seefull$value').style.display='none'\"></button>
                                                                </div>
                                                                <div class='modal-body mb-0'>
                                                                    <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>".$getupd["post"]."</p>
                                                                </div>
                                                                <div class='modal-body text-center'>
                                                                    <img src='$value' class='rounded-3 w-100' style='height: 250px; object-fit:contain'>
                                                                </div>
                                                                <div class='modal-footer text-center'>
                                                                    <div class='card-body d-flex p-0 mt-3'>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $displaylike</a>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                                    </div>
                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                                } elseif (($file_ext == "mp4") || ($file_ext == "3gp") || ($file_ext == "mp3") || ($file_ext == "gif")) {
                                                    echo "<div class='col-xs-4 col-sm-4 p-1'><video onclick=\"document.getElementById('seefull$value').style.display='block'\" src='$value' class='rounded-3 w-100' alt='video'></video></div>";

                                                    echo "
                                                    <div id='seefull$value' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                                        <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                                            <div class='card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3'>
                                                                <div class='modal-header'>
                                                                    <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                                        <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                                        <figure class='avatar me-3'><img src='profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                                    </form>
                                                                    <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                                    <button type='button' class='btn-close' onclick=\"document.getElementById('seefull$value').style.display='none'\"></button>
                                                                </div>
                                                                <div class='modal-body mb-0'>
                                                                    <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>".$getupd["post"]."</p>
                                                                </div>
                                                                <div class='modal-body text-center'>
                                                                    <video src='$value' class='rounded-3 w-100' style='height: 250px; object-fit:contain' controls></video>
                                                                </div>
                                                                <div class='modal-footer text-center'>
                                                                    <div class='card-body d-flex p-0 mt-3'>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $displaylike</a>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                                    </div>
                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                                }
                                            }
                                        } else {
                                            $dot = explode('.',$getupd["postmedia"]);
                                            $file_ext=strtolower(end($dot));
                                            if (($file_ext == "jpg") || ($file_ext == "png") || ($file_ext == "jpeg")) {
                                                echo "
                                                <div class='col-sm-12 p-1 text-center'><img onclick=\"document.getElementById('seefull".$getupd["postmedia"]."').style.display='block'\" src='".$getupd["postmedia"]."' class='mx-auto rounded-3 w-100' style='height:250px; object-fit:contain;' alt='image'></div>";
                                                
                                                echo "
                                                <div id='seefull".$getupd["postmedia"]."' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                                    <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                                        <div class='card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3'>
                                                            
                                                            <div class='modal-header'>
                                                                <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                                    <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                                    <figure class='avatar me-3'><img src='profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                                </form>
                                                                <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                                <button type='button' class='btn-close' onclick=\"document.getElementById('seefull".$getupd["postmedia"]."').style.display='none'\"></button>
                                                            </div>
                                                            <div class='modal-body mb-0'>
                                                                <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>".$getupd["post"]."</p>
                                                            </div>
                                                            <div class='modal-body text-center'>
                                                                <img src='".$getupd["postmedia"]."' class='rounded-3 w-100' style='height: 250px; object-fit:contain'>
                                                            </div>
                                                            <div class='modal-footer text-center'>
                                                                <div class='card-body d-flex p-0 mt-3'>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $displaylike</a>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                                </div>
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                            } elseif (($file_ext == "mp4") || ($file_ext == "3gp") || ($file_ext == "mp3") || ($file_ext == "gif")) {
                                                echo "
                                                <div class='col-sm-12 p-1 text-center'><video onclick=\"document.getElementById('seefull".$getupd["postmedia"]."').style.display='block'\" src='".$getupd["postmedia"]."' class='rounded-3 w-100' style='height:250px; object-fit:contain;' alt='video'></video></div>";
                                                
                                                echo "
                                                <div id='seefull".$getupd["postmedia"]."' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                                    <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                                        <div class='card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3'>
                                                        
                                                            <div class='modal-header'>
                                                                <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                                    <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                                    <figure class='avatar me-3'><img src='profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                                </form>
                                                                <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                                <button type='button' class='btn-close' onclick=\"document.getElementById('seefull".$getupd["postmedia"]."').style.display='none'\"></button>
                                                            </div>
                                                            <div class='modal-body mb-0'>
                                                                <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>".$getupd["post"]."</p>
                                                            </div>
                                                            <div class='modal-body text-center'>
                                                                <video src='".$getupd["postmedia"]."' class='rounded-3 w-100' style='height: 250px; object-fit:contain' controls></video>
                                                            </div>
                                                            <div class='modal-footer text-center'>
                                                                <div class='card-body d-flex p-0 mt-3'>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $displaylike</a>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                                </div>
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";

                                            }
                                        }
                                        echo "
                                        </div>
                                    </div>
                                    
                                    <div class='card-body d-flex p-0 mt-3'>
                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $displaylike</a>
                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                    </div>

                                </div>";
                                }
                            }
                            
                            if ($num_o_rows == 0) {
                                echo "
                                <div class='card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3'>
                                    <div class='snippet mt-2 ms-auto me-auto' data-title='.dot-typing'>
                                        <div class='stage'>
                                            <h3 class='fw-700 text-grey-900 font-xssss'>There is nothing to see here...</h3>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                            ?>



                            <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                    <div class="d-flex justify-content-between stage">
                                        <?php
                                        if ($startid >= 20) {
                                            $new_startid = $startid - 20;
                                            $new_stopid = 20;
                                            echo "
                                            <form action='' method='get' style=''>
                                            <input type='hidden' name='startid' value='$new_startid'>
                                            <input type='hidden' name='stopid' value='$new_stopid'>
                                            <button style='height:40px;width:40px;border-radius:50%;float:left !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-left text-white'></span></button>
                                            </form>";
                                        }
                                        ?>
                                        <?php
                                        if ($num_o_rows > 0) {
                                            $new_startid = $startid + 20;
                                            $new_stopid = 20;
                                            echo "
                                            <form action='' method='get' style=''>
                                            <input type='hidden' name='startid' value='$new_startid'>
                                            <input type='hidden' name='stopid' value='$new_stopid'>
                                            <button style='height:40px;width:40px;border-radius:50%;float:right !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-right text-white'></span></button>
                                            </form>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>


                        </div>               
                        <!-- End of main area -->



                        <div class="col-xl-4 col-xxl-3 col-lg-4 ps-lg-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-flex align-items-center p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Friends (0)</h4>
                                    <a href="find-friends.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                            </div>

                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3">
                                <div class="card-body d-flex align-items-center p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Suggest Group</h4>
                                    <a href="group.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 overflow-hidden border-top-xs bor-0">
                                    <img src="images/e-2.jpg" alt="img" class="img-fluid rounded-xxl mb-2">
                                </div>
                                <div class="card-body dd-block pt-0 ps-4 pe-4 pb-4">
                                    <ul class="memberlist mt-1 mb-2 ms-0 d-block">
                                        <li class="w20"><a href="#"><img src="images/user-6.png" alt="user" class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                        <li class="w20"><a href="#"><img src="images/user-7.png" alt="user" class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                        <li class="w20"><a href="#"><img src="images/user-8.png" alt="user" class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                        <li class="w20"><a href="#"><img src="images/user-3.png" alt="user" class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                        <li class="last-member"><a href="#" class="bg-greylight fw-600 text-grey-500 font-xssss w35 ls-3 text-center" style="height: 35px; line-height: 35px;">+2</a></li>
                                        <li class="ps-3 w-auto ms-1"><a href="#" class="fw-600 text-grey-500 font-xssss">Member apply</a></li>
                                    </ul>
                                </div>


                                 
                            </div>

                        </div>

                    </div>
                </div>
                
            </div>            
        </div>
        <!-- main content -->

        <!-- right chat -->
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                <!-- loader wrapper -->
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <!-- loader wrapper -->

                <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-8.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-7.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-6.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-5.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-4.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">4:09 pm</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-3.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">David Goria</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 days</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-2.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Seary Victor</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-12.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Ana Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>

            </div>
        </div>

        
        <!-- right chat -->
        <?php include "html_includes/mobile_menu.php"; ?>


    </div> 

    <div class="modal bottom side fade" id="Modalstory" tabindex="-1" role="dialog" style=" overflow-y: auto;">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-transparent">
                <button type="button" class="close mt-0 position-absolute top--30 right--10" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-900 font-xssss"></i></button>
                <div class="modal-body p-0">
                    <div class="card w-100 border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                        <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none">
                            <div class="item"><img src="images/story-5.jpg" alt="image"></div>
                            <div class="item"><img src="images/story-6.jpg" alt="image"></div>
                            <div class="item"><img src="images/story-7.jpg" alt="image"></div>
                            <div class="item"><img src="images/story-8.jpg" alt="image"></div>
                            
                        </div>
                    </div>
                    <div class="form-group mt-3 mb-0 p-3 position-absolute bottom-0 z-index-1 w-100">
                        <input type="text" class="style2-input w-100 bg-transparent border-light-md p-3 pe-5 font-xssss fw-500 text-white" value="Write Comments">               
                        <span class="feather-send text-white font-md text-white position-absolute" style="bottom: 35px;right:30px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-popup-chat">
        <div class="modal-popup-wrap bg-white p-0 shadow-lg rounded-3">
            <div class="modal-popup-header w-100 border-bottom">
                <div class="card p-3 d-block border-0 d-block">
                    <figure class="avatar mb-0 float-left me-2">
                        <img src="images/user-12.png" alt="image" class="w35 me-1">
                    </figure>
                    <h5 class="fw-700 text-primary font-xssss mt-1 mb-1">Hendrix Stamp</h5>
                    <h4 class="text-grey-500 font-xsssss mt-0 mb-0"><span class="d-inline-block bg-success btn-round-xss m-0"></span> Available</h4>
                    <a href="#" class="font-xssss position-absolute right-0 top-0 mt-3 me-4"><i class="ti-close text-grey-900 mt-2 d-inline-block"></i></a>
                </div>
            </div>
            <div class="modal-popup-body w-100 p-3 h-auto">
                <div class="message"><div class="message-content font-xssss lh-24 fw-500">Hi, how can I help you?</div></div>
                <div class="date-break font-xsssss lh-24 fw-500 text-grey-500 mt-2 mb-2">Mon 10:20am</div>
                <div class="message self text-right mt-2"><div class="message-content font-xssss lh-24 fw-500">I want those files for you. I want you to send 1 PDF and 1 image file.</div></div>
                <div class="snippet pt-3 ps-4 pb-2 pe-3 mt-2 bg-grey rounded-xl float-right" data-title=".dot-typing"><div class="stage"><div class="dot-typing"></div></div></div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-popup-footer w-100 border-top">
                <div class="card p-3 d-block border-0 d-block">
                    <div class="form-group icon-right-input style1-input mb-0"><input type="text" placeholder="Start typing.." class="form-control rounded-xl bg-greylight border-0 font-xssss fw-500 ps-3"><i class="feather-send text-grey-500 font-md"></i></div>
                </div>
            </div>
        </div> 
    </div>

     
    

   


    <script src="js/plugin.js"></script>
    <script src="js/lightbox.js"></script>
    <script src="js/scripts.js"></script>

    
</body>


<!-- Mirrored from uitheme.net/sociala/default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Apr 2022 22:53:19 GMT -->
</html>