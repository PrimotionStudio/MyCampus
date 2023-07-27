<?php
require_once("func/session.php");
require_once("func/sql.php");
require_once("func/misc.php");
require_once("func/validate_login.php");
require_once("func/time_ago.php");
require_once("partials/alert.php");
$pagetitle = "Messages - ";
require_once("partials/head.php");
?>
    <div class="preloader"></div>

    
    <div class="main-wrapper">
        <?php
        require_once("partials/nav_top.php");
        require_once("partials/nav_left.php");
        ?>
        
        <!-- main content -->
        <div class="main-content bg-lightblue theme-dark-bg">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0">
                    <div class="row">
                           
                        <div class="col-xl-12">
                            <div class="chat-wrapper p-3 w-100 position-relative scroll-bar bg-white theme-dark-bg">
                                <h2 class="fw-700 mb-4 mt-2 font-md text-grey-900 d-flex align-items-center">Chats
                                <span class="circle-count bg-warning text-white font-xsssss rounded-3 ms-2 ls-3 fw-600 p-2  mt-0">5</span> 
                                    <a href="#" class="ms-auto btn-round-sm bg-greylight rounded-3"><i class="feather-hard-drive font-xss text-grey-500"></i></a> 
                                    <a href="#" class="ms-2 btn-round-sm bg-greylight rounded-3"><i class="feather-alert-circle font-xss text-grey-500"></i></a> 
                                    <a href="#" class="ms-2 btn-round-sm bg-greylight rounded-3"><i class="feather-trash-2 font-xss text-grey-500"></i></a></h2>
                                    
                                </h2>
                                    
                                <ul class="notification-box">
                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3 bg-lightblue theme-light-bg">
                                            <img src="images/user-7.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Victor Exrixon</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 0l-auto"> 12 minutes ago</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3">
                                            <span class="btn-round-md me-3 bg-warning font-xs fw-700 text-white">M</span>
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Surfiya Zakir</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 0l-auto">30 minutes ago</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3">
                                            <img src="images/user-4.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Goria Coast</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 0l-auto">1 hours ago</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3">
                                            <img src="images/user-3.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Hurin Seary</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 0l-auto">2 hours ago</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3 bg-lightgreen theme-light-bg">
                                            <img src="images/user-2.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Victor Exrixon</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 0l-auto">6 hours ago</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3">
                                            <span class="btn-round-md me-3 bg-danger font-xs fw-700 text-white">S</span>
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Surfiya Zakir</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 0l-auto">11 hours ago</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>

                                    <h4 class="fw-600 mb-4 mt-2 font-xssss text-grey-500 d-flex align-items-center mt-4">Yesterday</h4>

                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3 bg-lightgrey theme-light-bg">
                                            <img src="images/user-4.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Goria Coast</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 ms-auto">12:48PM</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3">
                                            <img src="images/user-3.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Hurin Seary</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 ms-auto">12:48PM</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3">
                                            <img src="images/user-8.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Surfiya Zakir</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 ms-auto"> 12:48PM</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3 bg-lightblue theme-light-bg">
                                            <img src="images/user-2.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Victor Exrixon</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 ms-auto">  12:48PM</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>
                                    <h4 class="fw-600 mb-4 mt-2 font-xssss text-grey-500 d-flex align-items-center mt-4">12 July 2021</h4>
                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3 bg-lightblue theme-light-bg">
                                            <img src="images/user-8.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Surfiya Zakir</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 ms-auto">12:48PM</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3">
                                            <img src="images/user-4.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Goria Coast</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 ms-auto">12:48PM</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3">
                                            <img src="images/user-3.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Hurin Seary</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 ms-auto">12:48PM</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3">
                                            <img src="images/user-8.png" alt="user" class="w45 me-3">
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>Surfiya Zakir</strong>  “Mobile Apps UI Designer is required for Tech…” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 ms-auto"> 12:48PM</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>




                                </ul>                                 
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>            
        </div>
        <!-- main content -->

                
        <?php
        require_once("partials/mobile_nav.php");
        require_once("partials/search.php");
        ?>
        

    </div> 

    
    <script src="js/lightbox.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>
</html>