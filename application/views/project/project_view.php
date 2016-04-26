<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
            <xmp>
            <?php  print_r($project)?>
            </xmp>
<!-- beginning of hero -->
    <div id="project-hero" class="container-fluid" style="background-image:url(/themes/default/img/expose-hero.jpg);">
        <div class="row" id="project-main-logo">
            <div class="col-md-1"></div>
            <div class="col-md-2" id="project-logo"><img src="/themes/default/img/expose-logo.png" /></div>
            <div class="col-md-8" id="project-title">
                <h1 class="klavika-regular"><span>Project:</span> <?php echo $project['title'] ?></h1>
            </div>
            <div class="col-md-1"></div>
        </div>            
    </div>
    <!-- end of hero -->


    <!-- beginning of pledge row -->
    <div id="pledge-row" class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <h3>Project Goal</h3>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                        <span class="sr-only">40% Complete (success)</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3" id="back-project">
                <button>Back Project</button>
            </div>
            <div class="col-md-2"></div>
        </div>            
    </div>
    <!-- end of pledge row -->
    
    <!-- beginning of project info -->
    <div id="project-info" class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <h2 class="klavika-bold"><span>Project:</span> <?php echo $project['title'] ?></h2>
                <!-- beginning of project video -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/cgD8fJlkLqk"></iframe>
                </div>
                <!-- end of project video -->
                <!-- start of project tabs -->
                <div id="project-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#what" aria-controls="what" role="tab" data-toggle="tab">What is this project?</a></li>                   
                        <li role="presentation"><a href="#updates" aria-controls="updates" role="tab" data-toggle="tab">Updates</a></li>
                        <li role="presentation"><a href="#backers" aria-controls="backers" role="tab" data-toggle="tab">Backers</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="what">                     
                            <?php echo $project['description'] ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="updates">
                            <div class="project-update">
                                <h4>Looks good!</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec massa ut justo accumsan malesuada ut pharetra sapien. Nullam ac nisi vel augue ultrices venenatis sed sed felis. Quisque velit tortor, suscipit et auctor tempus, pretium eu velit. Vestibulum vitae ligula sapien. Donec et felis lorem. Vestibulum non feugiat risus.
                                </p>
                                <h6>posted: Benjamin Dry , 12th April 2016</h6>
                            </div>
                            <hr />
                            <div class="project-update">
                                <h4>Looks good!</h4>
                                <p>
                                    Sed malesuada nisl vel lorem rhoncus feugiat. Proin pellentesque velit nec metus tincidunt quis egestas tortor venenatis. Phasellus mattis sapien suscipit massa suscipit placerat. Vestibulum semper laoreet tempus. Curabitur ac sagittis urna. Sed rhoncus massa vel lorem lobortis sit amet adipiscing nunc aliquet. 
                                </p>
                                <h6>posted: Benjamin Dry , 12th April 2016</h6>
                            </div>
                            <hr />
                            <div class="project-update">
                                <h4>Looks good!</h4>
                                <p>
                                    Vestibulum semper laoreet tempus. Curabitur ac sagittis urna. Sed rhoncus massa vel lorem lobortis sit amet adipiscing nunc aliquet. 
                                </p>
                                <h6>posted: Benjamin Dry , 12th April 2016</h6>
                            </div>
                            <hr />
                        </div>
                        <div role="tabpanel" class="tab-pane" id="backers">
                            <ul>
                                <li>
                                    <img src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=60" /> Peter Syphilis - Australia <br /><em>about 3 minutes ago.</em>
                                </li>
                                <li>
                                    <img src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=60" /> Peter Syphilis - Australia <br /><em>about 3 minutes ago.</em>
                                </li>
                                <li>
                                    <img src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=60" /> Peter Syphilis - Australia <br /><em>about 3 minutes ago.</em>
                                </li>
                                <li>
                                    <img src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=60" /> Peter Syphilis - Australia <br /><em>about 3 minutes ago.</em>
                                </li>
                                <li>
                                    <img src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=60" /> Peter Syphilis - Australia <br /><em>about 3 minutes ago.</em>
                                </li>
                                <li>
                                    <img src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=60" /> Peter Syphilis - Australia <br /><em>about 3 minutes ago.</em>
                                </li>

                            </ul>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <div id="disqus_thread"></div>
                            <script>
                                /**
                                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                                 */
                                /*
                                var disqus_config = function () {
                                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
                                (function() {  // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    
                                    s.src = '//cgstarter.disqus.com/embed.js';
                                    
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

                        </div>
                    </div>
                    <!-- end of project tabs -->
                    <!-- start of social media block -->
                    <div id="social-media-block">
                        <a class="btn btn-social-icon btn-facebook">
                            <span class="fa fa-facebook"></span>
                        </a>
                        <a class="btn btn-social-icon btn-google">
                            <span class="fa fa-google"></span>
                        </a>
                        <a class="btn btn-social-icon btn-twitter">
                            <span class="fa fa-twitter"></span>
                        </a>
                        <a class="btn btn-social-icon btn-linkedin">
                            <span class="fa fa-linkedin"></span>
                        </a>
                        <a class="btn btn-social-icon btn-pinterest">
                            <span class="fa fa-pinterest"></span>
                        </a>
                    </div>
                    <!-- end of social media block -->
                    <hr />
                    <div id="project-leader">
                        <h4 class="klavika-regular">Project Leader</h4>
                        <h6>Mark Snoswell</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec massa ut justo accumsan malesuada ut pharetra sapien. Nullam ac nisi vel augue ultrices venenatis sed sed felis. Quisque velit tortor, suscipit et auctor tempus, pretium eu velit. Vestibulum vitae ligula sapien. Donec et felis lorem. Vestibulum non feugiat risus. Sed malesuada nisl vel lorem rhoncus feugiat. Proin pellentesque velit nec metus tincidunt quis egestas tortor venenatis. Phasellus mattis sapien suscipit massa suscipit placerat. Vestibulum semper laoreet tempus. Curabitur ac sagittis urna. Sed rhoncus massa vel lorem lobortis sit amet adipiscing nunc aliquet. 
                        </p>
                    </div>
                    <hr />

                </div>
                <!-- end of the project manager -->
            </div>
            <!-- start the pledges and data columns -->
            <div class="col-md-3" id="back-project">
                <ul id="project-stats">
                    <li id="stats-backer">
                        <strong>480</strong>
                        <em>Backers</em>
                        <hr />
                    </li>
                    <li id="stats-total">
                        <strong>22,000</strong>
                        <em>Pledged of $50,000 goal</em>
                        <hr />
                    </li>
                    <li id="stats-days">
                        <strong>20</strong>
                        <em>Days to go</em>
                        <hr />
                    </li>
                </ul>

                <h3>Pledges & Your Rewards</h3>
                <ul id="project-rewards">
                    <li>
                        <h4>Reward Title</h4>
                        <em>$70</em>
                        <img src="/themes/default/img/demobook.png" />
                        <p>Malesuada ut pharetra sapien. Nullam ac nisi vel augue ultrices venenatis sed sed felis. Quisque velit tortor, suscipit et auctor tempus, pretium eu </p>
                        <button>
                            PLEDGE
                        </button>
                    </li>
                    <li>
                        <h4>Reward Title</h4>
                        <em>$70</em>
                        <img src="/themes/default/img/demobook.png" />
                        <p>Malesuada ut pharetra sapien. Nullam ac nisi vel augue ultrices venenatis sed sed felis. Quisque velit tortor, suscipit et auctor tempus, pretium eu </p>
                        <button>
                            PLEDGE
                        </button>
                    </li>
                    <li>
                        <h4>Reward Title</h4>
                        <em>$70</em>
                        <img src="/themes/default/img/demobook.png" />
                        <p>Malesuada ut pharetra sapien. Nullam ac nisi vel augue ultrices venenatis sed sed felis. Quisque velit tortor, suscipit et auctor tempus, pretium eu </p>
                        <button>
                            PLEDGE
                        </button>
                    </li>
                   
                </ul>
            </div>
            <div class="col-md-2"></div>
        </div>  
        <!-- end the pledges and data columns -->          
    </div>
    <!-- end of pledge row -->