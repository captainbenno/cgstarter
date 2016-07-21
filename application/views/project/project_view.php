<?php defined('BASEPATH') OR exit('No direct script access allowed');

    $this->load->helper('date');

?>

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
                    <?php
                        if($project['goal_achievement']['achievement_percentage'] > 0){
                            $achievement_percentage = $project['goal_achievement']['achievement_percentage'];
                        }else{
                            $achievement_percentage = 1;
                        }
                    ?>
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $achievement_percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $achievement_percentage ?>%">
                        <span class="sr-only"><?php echo $achievement_percentage ?>% Complete (success)</span>
                    </div>
                </div>
            </div>
            <!--div class="col-md-3" id="back-project">
                <button>Back Project</button>
            </div-->
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
                    <img src="//cgimg.s3.amazonaws.com/newsletter/exp12.jpg" />
                    <!--iframe class="embed-responsive-item" src="//www.youtube.com/embed/cgD8fJlkLqk"></iframe -->
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

                            <a href="http://ballisticpublishing.com/books/expose/expose_12/callforentries/index.html"><img src="https://cgimg.s3.amazonaws.com/newsletter/july2016header.jpg" border="0" alt="EXPOSE 12" width="680" height="352"></a>



                            <h3>EXPOSÉ 12</h3>
                            <p>EXPOSÉ is the first and premiere
                                showcase for digital art and artists. Every year EXPOSÉ&nbsp; features
                                the best digital art in the know universe. Since it launched in 2003
                                EXPOSÉ&nbsp; has been a sensation -- a continuing global
                                phenomenon, receiving critical acclaim from all quarters of the digital
                                art industry.</p>
                            <p>
                                EXPOSÉ will expand to encompass an exciting range of products that
                                throughout the year will showcase you, your art, your techniques, your
                                inspirations and your experiences.&nbsp; EXPOSÉ will also celebrate the
                                influences and the impact of the digital arts. But always,
                                at the center, EXPOSÉ will celebrate extraordinary digital art and artists. <br>
                            </p>

                            <p>So have a global impact and be part of the excitement.<br>
                            </p>

                            <p class="skill">&nbsp;</p>
            <!-- // End About Section -->

                            <h3 class="section-title">Artists Testimonials EXPOSÉ 11</h3>

                            <!-- Testimonials Carousel -->
                            <div id="testimonials-carousel" class="flexslider carousel profile-carousel">
                                <ul class="slides">
                                    <li>
                                        <div class="profile text-center">
                                            <div class="profile-photo"><img src="//ballisticpublishing.com/books/expose/expose_12/callforentries/assets/img/test-01.jpg" alt=""></div>
                                            <div class="profile-content">
                                                <div class="profile-text"><p>The
                                                        book is really amazing ! It’s so cool to be showcased among so many
                                                        inspiring artists from around world! Thanks a lot to everyone on the
                                                        Ballistic Publishing team!</p></div>
                                                <div class="profile-info">
                                                    <span class="profile-name">Jean-Marc Emy</span>
                                                    <span class="profile-function">France</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="profile text-center">
                                            <div class="profile-photo"><img src="//ballisticpublishing.com/books/expose/expose_12/callforentries/assets/img/test-02.jpg" alt=""></div>
                                            <div class="profile-content">
                                                <div class="profile-text"><p>I'm
                                                        really glad to be part of this edition! Really appreciate the
                                                        opportunity to be in this select group, filled with great artists I
                                                        admire. Its incredibly motivational!</p></div>
                                                <div class="profile-info">
                                                    <span class="profile-name">Rodrigo Ramos</span>
                                                    <span class="profile-function">Brazil</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="profile text-center">
                                            <div class="profile-photo"><img src="//ballisticpublishing.com/books/expose/expose_12/callforentries/assets/img/test-03.jpg" alt=""></div>
                                            <div class="profile-content">
                                                <div class="profile-text"><p>It's
                                                        a great honour to feature in this years EXPOSÉ 11 and I am completely
                                                        thrilled to be sharing my work along such talented artists,
                                                        Congratulations to everyone who took part.</p></div>
                                                <div class="profile-info">
                                                    <span class="profile-name">Guy Atherfield</span>
                                                    <span class="profile-function">Great Britain</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="profile text-center">
                                            <div class="profile-photo"><img src="//ballisticpublishing.com/books/expose/expose_12/callforentries/assets/img/test-04.jpg" alt=""></div>
                                            <div class="profile-content">
                                                <div class="profile-text"><p>Thanks
                                                        to everyone involved in creating the amazing book EXPOSÉ 11! It is a
                                                        deep feeling to be part of this great artistic family, where we all grow
                                                        up year after year.</p></div>
                                                <div class="profile-info">
                                                    <span class="profile-name">Patricio Clarey</span>
                                                    <span class="profile-function">Spain</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>







                        </div>
                        <div role="tabpanel" class="tab-pane" id="updates">
                            <?php 
                                foreach ($project['project_news'] as $project_news) { ?>
                                    <div class="project-update">
                                        <h4><?php echo  $project_news['title']?></h4>
                                        <p>
                                            <?php echo  $project_news['description']?>
                                        </p>
                                        <h6>posted: <?php echo  $project_news['first_name']?> <?php echo  $project_news['last_name']?> ,  <?php echo date( 'd-m-Y H:i', strtotime( $project_news['create_date']) ); ?></h6>
                                    </div>
                                    <hr />
                            <?php 
                                }
                            ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="backers">
                            <ul>
                                <?php 
                                    foreach ($project['backers'] as $backer) { ?>
                                        <li>
                                            <img src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=60" /> <?php echo  $backer['first_name']?> <?php echo  $backer['last_name']?> - Australia <br />
                                            
                                            <em><?php

                                            $seconds_remaining = now() - $backer['backer_timestamp'];
                                            if($seconds_remaining<60){
                                                echo "&gt; 1 minute to ago";
                                            } else if($seconds_remaining<3600){
                                                echo floor($seconds_remaining/60)."minutes to go";
                                            } else if($seconds_remaining<86400){
                                                echo floor($seconds_remaining/60/60)." hours to go";
                                            } else if($seconds_remaining>=86400){
                                                echo "".floor($seconds_remaining/60/60/24)." days to go";
                                            } ?></em>
                                        </li>
                                <?php 
                                    }
                                ?>
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
                        <?php $socialLinks =  array('facebook','google','pinterest','twitter','instagram');
                            foreach ($socialLinks as $socialLink) {
                                if(strlen($project['url_'.$socialLink]) > 0){
                                    echo '
                                        <a href="'.$project['url_'.$socialLink].'" target="_blank" class="btn btn-social-icon btn-'.$socialLink.'">
                                            <span class="fa fa-'.$socialLink.'"></span>
                                        </a>
                                    ';                                    
                                }
                            } 
                        ?>
                    </div>
                    <!-- end of social media block -->
                    <hr />
                    <div id="project-leader">
                        <h4 class="klavika-regular">Project Leader</h4>
                        <?php 
                            foreach ($project['project_leaders'] as $project_leader) { ?>
                                <h6><?php echo  $project_leader['first_name']?> <?php echo  $project_leader['last_name']?></h6>
                                <p>
                                    <?php echo  $project_leader['leader_profile']?>
                                </p>                            
                        <?php 
                            }
                        ?>

                    </div>
                    <hr />

                </div>
                <!-- end of the project manager -->
            </div>
            <!-- start the pledges and data columns -->
            <div class="col-md-3" id="back-project">
                <ul id="project-stats">
                    <li id="stats-backer">
                        <strong><?php echo $project['backers_total'] ?></strong>
                        <em>Backers</em>
                        <hr />
                    </li>
                    <li id="stats-total">
                        <strong><?php if($project['goal_achievement']['achievement_dollars']>0){echo $project['goal_achievement']['achievement_dollars'];}else{echo 0;}?></strong>
                        <em>Pledged of $<?php echo  $project['goal']?> goal</em>
                        <hr />
                    </li>
                    <li id="stats-days">
                        <?php
                            $seconds_remaining = strtotime($project['end_date']) -now();

                            if($seconds_remaining<60){
                                echo "<strong>&gt; 1</strong><em> minute to go</em>";
                            } else if($seconds_remaining<3600){
                                echo "<strong>".floor($seconds_remaining/60)."</strong><em> minutes to go</em>";
                            } else if($seconds_remaining<86400){
                                echo "<strong>".floor($seconds_remaining/60/60)."</strong><em> hours to go</em>";
                            } else if($seconds_remaining>=86400){
                                echo "<strong>".floor($seconds_remaining/60/60/24)."</strong><em> days to go</em>";
                            }
                        ?>
                        <hr />
                    </li>
                </ul>

                <h3>Your Rewards</h3>
                <ul id="project-rewards">
                    <?php 
                        foreach ($project['project_rewards'] as $project_reward) { ?>
                            <li>
                                <h4><?php echo  $project_reward['title']?></h4>
                                <em>$<?php echo  $project_reward['price']?>
                                    <span>
                                    <?php if($project_reward['sold'] >= $project_reward['quantity']){ ?> 
                                        SOLD OUT!
                                    <? } else { ?>
                                        (<?php if($project_reward['sold'] > 0){ echo  $project_reward['sold']?> sold, <?php } echo  $project_reward['quantity']-$project_reward['sold']?> left)                                    
                                    <?php } ?>
                                    </span>
                                </em>
                                <img src="<?php echo  $project_reward['teaser_image']?>" />
                                <p><?php echo  $project_reward['teaser_text']?></p>
                                <a href="/cart/<?php echo  $project_reward['project_reward_id']?>" class="btn<?php if($project_reward['sold'] >= $project_reward['quantity']){ echo ' disabled'; } ?>" role="button">
                                    BUY ME!
                                </a>
                            </li>
                    <?php 
                        }
                    ?>

                </ul>
            </div>
            <div class="col-md-2"></div>
        </div>  
        <!-- end the pledges and data columns -->          
    </div>
    <!-- end of pledge row -->