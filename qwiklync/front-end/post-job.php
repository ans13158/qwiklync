    <?php     require "common/header.php";?>    <title>Opportunities A Mega Job Board Template</title></head>            <!-- FOR NAVBAR & BLACK STRIP ON TOP  -->            <?php require "common/navbar.php" ;  ?>        <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Post A Job</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                 <li><a href="index.php">Home</a> </li> </li>                                <li><a href="#">Dashboard</a> </li>                                <li class="active">Post Job </li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="post-job light-grey">            <div class="container">                <div class="row">                    <div class="col-md-8 col-sm-12 col-xs-12 col-md-push-4">                        <div class="Heading-title-left black small-heading">                            <h3>Post A New job</h3>                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>                        </div>                        <div class="post-job2-panel">                            <form class="row" action="enter-job.php" method="POST" name="postJobForm">                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Job Title *</label>                                        <input type="text" placeholder="Job Title" class="form-control" name="jobTitle" required="required">                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Location *</label>                                        <input type="text" placeholder="Job Location" class="form-control" name="jobLocation" required="required">                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Job Category *</label>                                        <select class="questions-category form-control" multiple="multiple" name="jobCategory" required="required">                                            <option value="Transporation">Transporation</option>                                            <option value="Restaurant, Food, Hotels">Restaurant, Food, Hotels</option>                                            <option value="Art, Design & Multimedia">Art, Design & Multimedia</option>                                            <option value="Healthcare & Medicine">Healthcare & Medicine</option>                                            <option value="Laravel">Laravel</option>                                            <option value="Sofware">Sofware</option>                                            <option value="Computer & IT">Computer & IT</option>                                            <option value="Accounting & Finance">Accounting & Finance</option>                                            <option value="Education & Academia">Education & Academia</option>                                            <option value="Construction, Engineering">Construction, Engineering</option>                                            <option value="Software & Development">Software & Development</option>                                        </select>                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Job Sub-category *</label>                                        <input type="text" placeholder="Web Developer/Marketing Manager/Salesman etc." class="form-control" name="jobSubCategory" required="required">                                    </div>                                </div>                                <div class="clearfix"></div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Job Type *</label>                                        <select class="questions-category form-control" name="jobType" required="required">                                            <option value="Full Time">Full Time</option>                                            <option value="Part Time">Part Time</option>                                            <option value="Work From Home">Work From Home</option>                                            <option value="Freelancer">Freelancer</option>                                        </select>                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Shift</label>                                        <select class="questions-category form-control" name="jobShift">                                            <option value="Morning">Morning</option>                                            <option value="Evening">Evening</option>                                                                                    </select>                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Vacancies *</label>                                        <input type="text" placeholder="Number of Job Vacancies" class="form-control" name="jobVacancy" required="required">                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Job Experience</label>                                        <select class="questions-category form-control" name="jobExperience">                                            <option value="Fresher">Fresher</option>                                            <option value="1 Year">1 Year</option>                                            <option value="2 Years">2 Years</option>                                            <option value="3 Years">3 Years</option>                                            <option value="4 Years">4 Years</option>                                            <option value="5 Years">5 Years</option>                                            <option value="6+ Years">6+ Years</option>                                        </select>                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Expected Salary *</label>                                        <select class="questions-category form-control" name="jobSalary" required="required">                                            <option value="Less than 10,000">Less than 10,000</option>                                            <option value="10,000 +">10,000 +</option>                                            <option value="20,000 +">20,000 +</option>                                            <option value="30,000 +">30,000 +</option>                                            <option value="40,000 +">40,000 +</option>                                            <option value="50,000 +">50,000 +</option>                                            <option value="100,000 +">100,000 +</option>                                            <option value="Negotiable">Negotiable</option>                                        </select>                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Last Date of Application *</label>                                        <input type="date" class="questions-category form-control" name="jobLastDate" required="required">                                                                                </div>                                </div>                                <div class="clearfix"></div>                                                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Type of Job you want this to be displayed *</label>                                        <select class="questions-category form-control" name="jobKind" required="required">                                            <option value="Featured Job">Featured Job</option>                                            <option value="Hot Job">Hot Job</option>                                                                                    </select>                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Tags *</label>                                        <input type="text" class="questions-category form-control" id= "tags" value="software ,laravel, html" class="form-control" data-role="tagsinput" name="jobTags" required="required">                                    </div>                                </div>                                <div class="col-md-12 col-sm-12 col-xs-12">                                    <div class="form-group">                                        <label>Job Description *</label>                                        <textarea name="jobDesc" class="ckeditor" ></textarea required="required" >                                    </div>                                </div>                                <div class="col-md-12 col-sm-12 col-xs-12">                                    <div class="form-group">                                        <label>Job Specifications *</label>                                        <textarea name="jobSpecs" class="ckeditor" required="required">                                            Selected Employees would do the following work:<br>                                            1).<br>                                            2).<br>                                            3).<br>                                            4).<br>                                            5).<br>                                        </textarea>                                    </div>                                </div>                                <div class="col-md-12 col-sm-12 col-xs-12">                                    <div class="form-group">                                        <label>Technical Guidance *</label>                                        <textarea name="jobTechGuide" class="ckeditor" required="required">                                            1).<br>                                            2).<br>                                            3).<br>                                            4).<br>                                            5).<br>                                        </textarea>                                    </div>                                </div>                                <div class="col-md-12 col-sm-12 col-xs-12">                                                                    <button class="btn btn-default pull-right">Post Job <i class="fa fa-angle-right"></i></button>                                </div>                            </form>                        </div>                    </div>                    <div class="col-md-4 col-sm-12 col-xs-12 col-md-pull-8">                        <div class="widget">                            <div class="widget-heading"><span class="title">Top Employees</span></div>                            <div class="" id="followers">                                <ul class="list-group list-group-dividered list-group-full">                                    <li class="list-group-item">                                        <div class="media">                                            <div class="media-left">                                                <a class="avatar avatar-online" href="javascript:void(0)">                                                    <img src="images/users/1.jpg" class="img-responsive" alt="">                                                    <i></i>                                                </a>                                            </div>                                            <div class="media-body">                                                <div class="pull-right">                                                    <button type="button" class="btn btn-default btn-sm">Hire</button>                                                </div>                                                <div><a class="name" href="javascript:void(0)">Willard Wood</a></div>                                                <small>@heavybutterfly920</small>                                            </div>                                        </div>                                    </li>                                    <li class="list-group-item">                                        <div class="media">                                            <div class="media-left">                                                <a class="avatar avatar-away" href="javascript:void(0)">                                                    <img src="images/users/2.jpg" class="img-responsive" alt="">                                                    <i></i>                                                </a>                                            </div>                                            <div class="media-body">                                                <div class="pull-right">                                                    <button type="button" class="btn btn-default btn-sm">Hire</button>                                                </div>                                                <div><a class="name" href="javascript:void(0)">Ronnie Ellis</a></div>                                                <small>@kingronnie24</small>                                            </div>                                        </div>                                    </li>                                    <li class="list-group-item">                                        <div class="media">                                            <div class="media-left">                                                <a class="avatar avatar-busy" href="javascript:void(0)">                                                    <img src="images/users/3.jpg" class="img-responsive" alt="">                                                    <i></i>                                                </a>                                            </div>                                            <div class="media-body">                                                <div class="pull-right">                                                    <button type="button" class="btn btn-default btn-sm">Hire</button>                                                </div>                                                <div><a class="name" href="javascript:void(0)">Gwendolyn Wheeler</a></div>                                                <small>@perttygirl66</small>                                            </div>                                        </div>                                    </li>                                    <li class="list-group-item">                                        <div class="media">                                            <div class="media-left">                                                <a class="avatar avatar-off" href="javascript:void(0)">                                                    <img src="images/users/4.jpg" class="img-responsive" alt="">                                                    <i></i>                                                </a>                                            </div>                                            <div class="media-body">                                                <div class="pull-right">                                                    <button type="button" class="btn btn-default btn-sm">Hire</button>                                                </div>                                                <div><a class="name" href="javascript:void(0)">Daniel Russell</a></div>                                                <small>@danieltiger08</small>                                            </div>                                        </div>                                    </li>                                    <li class="list-group-item">                                        <div class="media">                                            <div class="media-left">                                                <a class="avatar avatar-off" href="javascript:void(0)">                                                    <img src="images/users/5.jpg" class="img-responsive" alt="">                                                    <i></i>                                                </a>                                            </div>                                            <div class="media-body">                                                <div class="pull-right">                                                    <button type="button" class="btn btn-default btn-sm">Hire</button>                                                </div>                                                <div><a class="name" href="javascript:void(0)">Daniel Russell</a></div>                                                <small>@danieltiger08</small>                                            </div>                                        </div>                                    </li>                                </ul>                            </div>                        </div>                    </div>                </div>            </div>        </section>                 <!--- required for SUB-FOOTER PAGE and FOOTER   -->        <?php require "common/footer.php" ; ?>                    <!--- Footer ends   -->        <!-- JAVASCRIPT JS  -->        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>        <!-- JAVASCRIPT JS  -->     <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>        <!-- BOOTSTRAP CORE JS -->        <script type="text/javascript" src="js/bootstrap.min.js"></script>        <!-- JQUERY SELECT -->        <script type="text/javascript" src="js/select2.min.js"></script>        <!-- MEGA MENU -->        <script type="text/javascript" src="js/mega_menu.min.js"></script>                 <!-- JQUERY COUNTERUP -->        <script type="text/javascript" src="js/counterup.js"></script>        <!-- JQUERY WAYPOINT -->        <script type="text/javascript" src="js/waypoints.min.js"></script>        <!-- JQUERY REVEAL -->        <script type="text/javascript" src="js/footer-reveal.min.js"></script>        <!-- Owl Carousel -->        <script type="text/javascript" src="js/owl-carousel.js"></script>        <!-- FOR THIS PAGE ONLY -->        <script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>        <script type="text/javascript">            $('#tags').tagsInput({                width: 'auto'            });        </script>        <!-- CK-EDITOR -->        <script src="http://cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>        <script type="text/javascript">            CKEDITOR.replace('ckeditor');        </script>        <!-- FOR THIS PAGE ONLY -->        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVj6yChAfe1ilA4YrZgn_UCAnei8AhQxQ&amp;sensor=false"></script>        <script type="text/javascript" src="js/map.js"></script>        <!-- CORE JS -->        <script type="text/javascript" src="js/custom.js"></script>    </div></body></html>