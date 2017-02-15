<?php defined('BASEPATH') OR exit('No direct script access allowed');

    $this->load->helper('date');

?>

<!-- beginning of hero -->
    <div id="project-hero" class="container-fluid" style="background-image:url(/themes/default/img/expose-hero.jpg);">
        <div class="row" id="project-main-logo">
            <div class="col-md-1"></div>
            <div class="col-md-2" id="project-logo">
            </div>
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
                <div class="embed-responsive embed-responsive-16by9 top-image">
                    <img src="/themes/default/img/expose12/14224836_10153829056433148_9072124840330807846_n.jpg" style="width: 765px;">
                    <!--iframe class="embed-responsive-item" src="//www.youtube.com/embed/cgD8fJlkLqk"></iframe -->
                </div>
                <!-- end of project video -->
                <!-- start of project tabs -->
                <div id="project-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#what" aria-controls="what" role="tab" data-toggle="tab">What is this project?</a></li>                   
                        <li role="presentation"><a href="#awards" aria-controls="awards" role="tab" data-toggle="tab">Awards</a></li>
                        <li role="presentation"><a href="#layouts" aria-controls="layouts" role="tab" data-toggle="tab">Layouts</a></li>
                        <li role="presentation"><a href="#updates" aria-controls="updates" role="tab" data-toggle="tab">Updates</a></li>
                        <li role="presentation"><a href="#backers" aria-controls="backers" role="tab" data-toggle="tab">Backers</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="what">


                            <style type="text/css">
                                /* Container DIV - automatically generated */
                                .simply-scroll-container {
                                    position: relative;
                                }

                                /* Clip DIV - automatically generated */
                                .simply-scroll-clip {
                                    position: relative;
                                    overflow: hidden;
                                }

                                /* UL/OL/DIV - the element that simplyScroll is inited on
                                Class name automatically added to element */
                                .simply-scroll-list {
                                    overflow: hidden;
                                    margin: 0;
                                    padding: 0;
                                    list-style: none;
                                }

                                .simply-scroll-list li {
                                    padding: 0;
                                    margin: 0;
                                    list-style: none;
                                }

                                .simply-scroll-list li img {
                                    border: none;
                                    display: block;
                                }

                                /* Custom class modifications - adds to / overrides above

                                .simply-scroll is default base class */

                                /* Container DIV */
                                .simply-scroll {
                                    width: 750px;
                                    height: 130px;
                                    margin-bottom: 1em;
                                }

                                /* Clip DIV */
                                .simply-scroll .simply-scroll-clip {
                                    width: 750px;
                                    height: 130px;
                                }

                                /* Explicitly set height/width of each list item */
                                .simply-scroll .simply-scroll-list li {
                                    float: left; /* Horizontal scroll only */
                                    width: 100px;
                                    height: 130px;
                                }

                                .simply-scroll .simply-scroll-list li #booktitle{
                                    display:none;
                                }

                                .am-wrapper{
                                    float:left;
                                    position:relative;
                                    overflow:hidden;
                                }
                                .am-wrapper img{
                                    position:absolute;
                                    outline:none;
                                }

                            </style>

                            <script type="text/javascript" src="https://ballisticpublishing.com/jquery.simplyscroll.js"></script>

                            <script type="text/javascript">
                                $(document).ready(function() {
                                        $("#scroller").simplyScroll({autoMode: 'bounce'});


                                    var $container 	= $('#am-container'),
                                        $imgs		= $container.find('img').hide(),
                                        totalImgs	= $imgs.length,
                                        cnt			= 0;

                                    $imgs.each(function(i) {
                                        var $img	= $(this);
                                        $('<img/>').load(function() {
                                            ++cnt;
                                            if( cnt === totalImgs ) {
                                                $imgs.show();
                                                $container.montage({
                                                    fixedHeight : 60
                                                });

                                                /*
                                                 * just for this demo:
                                                 */
                                                $('#overlay').fadeIn(500);
                                            }
                                        }).attr('src',$img.attr('src'));
                                    });

                                    $('#am-container img').click(function(){
                                        $('#zoom').modal();
                                        largeimage = $(this).attr("src");
                                        $('#image-zoom').attr('src',largeimage);
                                    })

                                });
                            </script>

                            <!-- Modal -->
                            <div class="modal fade" id="zoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Closer Look</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img id="image-zoom" src="" style="margin:0 auto;width:100%"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php 
                                $project_news = $project['project_news'][0] ?>
                                    <div class="project-update">
                                        <h4><?php echo  $project_news['title']?></h4>
                                        <p>
                                            <?php echo  $project_news['description']?>
                                        </p>
                                        <h6>posted: <?php echo  $project_news['first_name']?> <?php echo  $project_news['last_name']?> ,  <?php echo date( 'd-m-Y H:i', strtotime( $project_news['create_date']) ); ?></h6>
                                    </div>
                                    <hr />


                            <?php echo $project['description'] ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="awards">
                            <?php require_once BASEPATH.'../htdocs/includes/awards.html' ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="layouts">
                            <?php require_once BASEPATH.'../htdocs/includes/layouts.html' ?>
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
                                            <img src="https://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $backer['email'] ) ) ); ?>?s=60" /> <?php echo  $backer['first_name']?> <?php echo  $backer['last_name']?> - <?php echo  $backer['billing_country']?> <br />
                                            
                                            <em><?php

                                            $seconds_remaining = now() - $backer['backer_timestamp'];
                                            if($seconds_remaining<60){
                                                echo "&gt; 1 minute to ago";
                                            } else if($seconds_remaining<3600){
                                                echo floor($seconds_remaining/60)."minutes ago";
                                            } else if($seconds_remaining<86400){
                                                echo floor($seconds_remaining/60/60)." hours ago";
                                            } else if($seconds_remaining>=86400){
                                                echo "".floor($seconds_remaining/60/60/24)." days ago";
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
                        <h4 class="klavika-regular">Project Team</h4>

                        <p style="padding-left: 0;">Ballistic Publishing is headed up by the same people that started the company over 12 years ago. We are also lucky to have most of our team still with us. Together the team has many decades of combined Publishing experience.</p>
                        <ul>
                        <?php
                            foreach ($project['project_leaders'] as $project_leader) { ?>
                                <li>
                                    <?php if(file_exists('themes/default/img/user_'.$project_leader['user_id'].'.png')){ ?>
                                        <?php echo '<img src="/themes/default/img/user_'.$project_leader['user_id'].'.png" />'; ?>
                                    <?php }else{ ?>
                                        <img src="https://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $project_leader['email'] ) ) ); ?>?s=60" />
                                    <?php } ?>
                                    <h6><b><?php echo  $project_leader['first_name']?> <?php echo  $project_leader['last_name']?></b></h6>
                                    <p>
                                        <?php echo  $project_leader['leader_profile']?>
                                    </p>
                                </li>
                        <?php 
                            }
                        ?>
                        </ul>

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
                    <li id="<?php if($project['goal_type'] == 'items'){ ?>stats-item<?php } else { ?>stats-total<?php } ?>">
                        <strong><?php if($project['goal_achievement']['achievement_total']>0){echo $project['goal_achievement']['achievement_total'];}else{echo 0;}?></strong>
                        <em>
                            <?php if($project['goal_type'] == 'items'){ ?>
                                Items sold of <?php echo  $project['goal']?> goal</em>
                            <?php }else{ ?>
                                Pledged of $<?php echo  $project['goal']?> goal</em>
                            <?php } ?>
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
                                <em>
                                    <?php if($project_reward['rrp']>0){
                                        echo  "<span class='rrp'>($".$project_reward['rrp'].")</span>";
                                    }?>
                                    $<?php echo  $project_reward['price']?>
                                    <span>
                                    <?php if($project_reward['sold'] >= $project_reward['quantity']){ ?> 
                                        SOLD OUT!
                                    <?php } else { ?>
					                    <?php if($project_reward['sold'] > 0){ echo '('.$project_reward['sold'].' sold)'; } ?>
                                    <?php } ?> <br>
                                        <?php if($project_reward['shipping']>0){ ?>
                                        shipping $<?php echo  $project_reward['shipping']?>
                                    <?php } ?>
                                </span>
                                </em>
                                <!-- img src="<?php echo  $project_reward['teaser_image']?>" / -->
                                <p class="reward_teasertext"><?php echo  $project_reward['teaser_text']?></p>
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
