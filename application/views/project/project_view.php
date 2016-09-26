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

                            <script type="text/javascript" src="http://ballisticpublishing.com/jquery.simplyscroll.js"></script>

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

                                    $('#am-container img').imageTooltip({
                                        xOffset: '300',
                                        yOffset: 0
                                    });


                                });
                            </script>

                            <ul id="scroller">

                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_11/"><div id="booktitle">EXPOSE 11</div><img id="bookimage"src="http://www.ballisticpublishing.com/carousel/expose11.png" alt="EXPOSE 11"><div id="bookseries"></div></a></li>
                                   <li><a href="http://www.ballisticpublishing.com/books/expose/expose_11/"><div id="booktitle">EXPOSE 11</div><img id="bookimage"src="http://www.ballisticpublishing.com/carousel/expose11.png" alt="EXPOSE 11"><div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_10/"><div id="booktitle">EXPOSÉ 10</div>
                                  <img id="bookimage13"src="http://www.ballisticpublishing.com/carousel/expose10.png" alt="EXPOSÉ 10">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_9/"><div id="booktitle">EXPOSÉ 9</div>
                                  <img id="bookimage14"src="http://www.ballisticpublishing.com/carousel/expose9.png" alt="EXPOSÉ 9">
                                  <div id="bookseries"></div></a></li>
                                <li>
                                  <a href="http://www.ballisticpublishing.com/books/expose/expose_8/"><div id="booktitle">EXPOSÉ 8</div>
                                  <img id="bookimage14"src="http://www.ballisticpublishing.com/carousel/expose8.png" alt="EXPOSÉ 8">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_7/"><div id="booktitle">EXPOSÉ 7</div>
                                  <img id="bookimage16"src="http://www.ballisticpublishing.com/carousel/expose7.png" alt="EXPOSÉ 7">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_6/"><div id="booktitle">EXPOSÉ 6</div>
                                  <img id="bookimage17"src="http://www.ballisticpublishing.com/carousel/expose6.png" alt="EXPOSÉ 6">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_5/"><div id="booktitle">EXPOSÉ 5</div>
                                  <img id="bookimage18"src="http://www.ballisticpublishing.com/carousel/expose5.png" alt="EXPOSÉ 5">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_4/"><div id="booktitle">EXPOSÉ 4</div>
                                  <img id="bookimage19"src="http://www.ballisticpublishing.com/carousel/expose4.png" alt="EXPOSÉ 4">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_3/"><div id="booktitle">EXPOSÉ 3</div>
                                  <img id="bookimage20"src="http://www.ballisticpublishing.com/carousel/expose3.png" alt="EXPOSÉ 3">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_2/"><div id="booktitle">EXPOSÉ 2</div>
                                  <img id="bookimage21"src="http://www.ballisticpublishing.com/carousel/expose2.png" alt="EXPOSÉ 2">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/expose/expose_1/"><div id="booktitle">EXPOSÉ 1</div>
                                  <img id="bookimage22"src="http://www.ballisticpublishing.com/carousel/expose1.png" alt="EXPOSÉ 1">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/uncharted2/"><div id="booktitle">Character Design</div><img id="bookimage"src="http://www.ballisticpublishing.com/carousel/dartiste_charcDes.png" alt="expose"><div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/dartiste/character_modeling_3/"><div id="booktitle">Character Modeling 3</div>
                                  <img id="bookimage2"src="http://www.ballisticpublishing.com/carousel/dartiste_charcMod3.png" alt="Character Modeling 3">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/dartiste/character_modeling_2/"><div id="booktitle">Character Modeling 2</div>
                                  <img id="bookimage3"src="http://www.ballisticpublishing.com/carousel/dartiste_charcMod2.png" alt="Character Modeling 2">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/dartiste/character_modeling/"><div id="booktitle">Character Modeling 1</div>
                                  <img id="bookimage4"src="http://www.ballisticpublishing.com/carousel/dartiste_charcMod1.png" alt="Character Modeling 1">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/dartiste/digital_painting_2/"><div id="booktitle">Digital Paiting 2</div>
                                  <img id="bookimage5"src="http://www.ballisticpublishing.com/carousel/dartiste_digPaint2.png" alt="Digital Paiting 2">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/dartiste/digital_painting/"><div id="booktitle">Digital Painting 1</div>
                                  <img id="bookimage6"src="http://www.ballisticpublishing.com/carousel/dartiste_digPaint1t.png" alt="Digital Paiting 1">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/dartiste/concept_art/"><div id="booktitle">Concept Art</div>
                                  <img id="bookimage7"src="http://www.ballisticpublishing.com/carousel/dartiste_concept.png" alt="Concept Art">
                                  <div id="bookseries"></div></a></li>

                                   <li><a href="http://www.ballisticpublishing.com/books/dartiste/matte_painting_3/"><div id="booktitle">Matte Painting 3</div>
                                  <img src="http://www.ballisticpublishing.com/carousel/dartiste_mp3.png" alt="Matte Painting 3" name="mp3" id="bookimage8">
                                  <div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/dartiste/matte_painting_2/"><div id="booktitle">Matte Painting 2</div>
                                  <img id="bookimage8"src="http://www.ballisticpublishing.com/carousel/dartiste_mp2.png" alt="Matte Painting 2">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/dartiste/matte_painting/"><div id="booktitle">Matte Painting 1</div>
                                  <img id="bookimage9"src="http://www.ballisticpublishing.com/carousel/dartiste_mp1.png" alt="Matte Painting 1">
                                  <div id="bookseries"></div></a></li>
                                  <li><a href="http://www.ballisticpublishing.com/books/exotique_7/"><div id="booktitle">EXOTIQUE 7</div>
                                  <img id="bookimage9"src="http://www.ballisticpublishing.com/carousel/exotique_7.png" alt="EXOTIQUE 7">
                                  <div id="bookseries"></div></a></li>
                                   <li><a href="http://www.ballisticpublishing.com/books/exotique_6/"><div id="booktitle">EXOTIQUE 6</div><img id="bookimage"src="http://www.ballisticpublishing.com/carousel/exotique_6.png" alt="EXOTIQUE 6"><div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/exotique_5/"><div id="booktitle">EXOTIQUE 5</div>
                                  <img id="bookimage13"src="http://www.ballisticpublishing.com/carousel/exotique_5.png" alt="EXOTIQUE 5">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/exotique_4/"><div id="booktitle">EXOTIQUE 4</div>
                                  <img id="bookimage14"src="http://www.ballisticpublishing.com/carousel/exotique_4.png" alt="EXOTIQUE 4">
                                  <div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/exotique_3/"><div id="booktitle">EXOTIQUE 3</div>
                                  <img id="bookimage15"src="http://www.ballisticpublishing.com/carousel/exotique_3.png" alt="EXOTIQUE 3">
                                  <div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/exotique_2/"><div id="booktitle">EXOTIQUE 2</div>
                                  <img id="bookimage16"src="http://www.ballisticpublishing.com/carousel/exotique_2.png" alt="EXOTIQUE 2">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/exotique/"><div id="booktitle">EXOTIQUE 1</div>
                                  <img id="bookimage17"src="http://www.ballisticpublishing.com/carousel/exotique_1.png" alt="EXOTIQUE 1">
                                  <div id="bookseries"></div></a></li>
                                 <li><a href="http://www.ballisticpublishing.com/books/theartofthegame/gearsofwar3/"><div id="booktitle">Gears of War 3</div>
                                  <img id="bookimage18"src="http://www.ballisticpublishing.com/carousel/art_gears.png" alt="Gears of War 3">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/theartofthegame/godofwar3/index.php"><div id="booktitle">God of War III</div>
                                  <img id="bookimage19"src="http://www.ballisticpublishing.com/carousel/art_god.png" alt="God of War 3">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/uncharted2/"><div id="booktitle">Unchartered 2</div>
                                  <img id="bookimage20"src="http://www.ballisticpublishing.com/carousel/art_unchart.png" alt="Unchartered 2">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/oddworld/"><div id="booktitle">Oddworld</div>
                                  <img id="bookimage21"src="http://www.ballisticpublishing.com/carousel/art_odd.png" alt="Oddworld">
                                  <div id="bookseries"></div></a></li>
                                <li><a href="http://www.ballisticpublishing.com/books/elemental3/"><div id="booktitle">Elemental 3</div>
                                  <img id="bookimage22"src="http://www.ballisticpublishing.com/carousel/elemental_3.png" alt="Elemental 3">
                                  <div id="bookseries"></div></a></li>
                                   <li><a href="http://www.ballisticpublishing.com/books/uncharted2/"><div id="booktitle">Elemental 2</div><img id="bookimage"src="http://www.ballisticpublishing.com/carousel/elemental_2.png" alt="Elemental 2"><div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/elemental/"><div id="booktitle">Elemental 1</div>
                                  <img id="bookimage13"src="http://www.ballisticpublishing.com/carousel/elemental_1.png" alt="Elemental 1">
                                  <div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/machineflesh/"><div id="booktitle">MachineFlesh</div>
                                  <img id="bookimage14"src="http://www.ballisticpublishing.com/carousel/challenge_machineflesh.png" alt="MachineFlesh">
                                  <div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/grand_space_opera/"><div id="booktitle">Grand Space Opera</div>
                                  <img id="bookimage15"src="http://www.ballisticpublishing.com/carousel/challenge_gso.png" alt="Grand Space Opera">
                                  <div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/vesage/"><div id="booktitle">VESAGE</div>
                                  <img id="bookimage16"src="http://www.ballisticpublishing.com/carousel/vesage.png" alt="VESAGE">
                                  <div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/painter/"><div id="booktitle">Painter</div>
                                  <img id="bookimage17"src="http://www.ballisticpublishing.com/carousel/painter.png" alt="Painter">
                                  <div id="bookseries"></div></a></li>

                                <li><a href="http://www.ballisticpublishing.com/books/machine_phase/"><div id="booktitle">Machine Phase</div>
                                  <img id="bookimage18"src="http://www.ballisticpublishing.com/carousel/machinePhase.png" alt="Machine Phase">
                                  <div id="bookseries"></div></a></li>

                            </ul>

                            <h3>We're back!</h3>

                            <p>Starting with EXPOSÉ 12 we are going back to our roots... we’re going Ballistic again!</p>

                            <p>Ballistic Media started as a crowd funded company long before the term &quot;crowd funding&quot;
                            was invented.</p>

                            <p><strong>From now on Ballistic books and other new products will be created and sold only by
                            campaign and direct sales.</strong></p>

                            <p>Please join us in propelling Ballistic and all the digital artists who participate to even greater
                            heights – order your book now.</p>

                            <h3>Better prices – same award winning quality!</h3>

                            <p>We can deliver more books at a lower price by returning to our original campaign model. We also offer new add-ons and products by going back to our roots and selling books by
                            campaign.</p>

                            <p>Bundles include eBooks and memberships to Hard Cover and Limited editions at prices that are
                            better than we used to be able to do in single books!</p>

                            <p>Ballistic is a multi-award winning book publisher. We are still the world’s leading premiere
                            digital art book publisher with over 50 books published and delivered globally over the last
                            decade.</p>
                            <div id="panel" class="panel hide"></div>
                            <script src="/themes/default/js/image-tooltip.js"></script>

                            <div class="am-container" id="am-container" style="margin: 0px auto;clear: both;width: 790px;float: left;margin-bottom: 20px;">
                                <?php

                                if ($handle = opendir('../htdocs/themes/default/img/expose12/')) {

                                    while (false !== ($entry = readdir($handle))) {

                                        if ($entry != "." && $entry != "..") {

                                            echo '<a href="#"><img src="/themes/default/img/expose12/'.$entry.'" /></a>';
                                        }
                                    }
                                    closedir($handle);
                                }
                                ?>
                            </div>

                            <h3>Affordable shipping!</h3>

                            <p>Ballistic Media has over a decade of experience with global shipping of books. We have
                            shipped many 10&#39;s of thousands of books to over 170 countries. With our experience we can
                            offer unbeatable quality and price for shipping books in our famous specialty book cartons.</p>

                            <blockquote>FLAT RATE SHIPPING TO THE WORLD $15 per book</blockquote>

                            <div style="background-color: #cccccc; padding: 15px; margin-top:20px;margin-bottom:20px">

                            <h3>Prices &amp; Bundles</h3>

                            <table class="table">
                                <tr>
                                    <td>
                                        EXPOSÉ 12 – Hard Cover book
                                    </td>
                                    <td>
                                        $50 + $15 S/H
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        EXPOSÉ 12 – Limited Edition book
                                    </td>
                                    <td>
                                        $120 + $15 S/H
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        EXPOSÉ 12 EXTENDED – eBook
                                    </td>
                                    <td>
                                        eBook $20 (not available separately)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        EXPOSÉ MEMBERSHIP
                                    </td>
                                    <td>
                                        $20
                                    </td>
                                </tr>
                            </table>

                            <h4>Hard Cover Bundle</h4>
                            <table class="table">
                                <tr>
                                    <td>
                                        EXPOSÉ 12 ● EXTENDED ● MEMBERSHIP
                                        <br>
                                        Includes…
                                        <br>
                                        <ul>
                                            <li>
                                                EXPOSÉ 12 Hard cover $49.95
                                            </li>
                                            <li>
                                                EXTENDED <span style="text-decoration: line-through">$20</span> $10
                                            </li>
                                            <li>
                                                MEMBERSHIP <span style="text-decoration: line-through">$20</span> $10
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span style="text-decoration: line-through">$90</span> $69.95 + $15 S/H
                                    </td>
                                </tr>
                            </table>

                            <h4>Limited Edition Bundle</h4>
                            <table class="table">
                                <tr>
                                    <td>
                                        EXPOSÉ 12 LIMITED ● EXTENDED ● MEMBERSHIP
                                        <br>
                                        Includes…
                                        <br>
                                        <ul>
                                            <li>
                                                EXPOSÉ 12 Leather bound Limited Edition $119.95
                                            </li>
                                            <li>
                                                EXTENDED <span style="text-decoration: line-through">$20</span> $10
                                            </li>
                                            <li>
                                                MEMBERSHIP <span style="text-decoration: line-through">$20</span> $10
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span style="text-decoration: line-through">$160</span> $139.95 + $15 S/H
                                    </td>
                                </tr>
                            </table>

                            <h4>Bulk Box of 10</h4>
                            <table class="table">
                                <tr>
                                    <td>
                                        EXPOSÉ 12 BOX – Box of 10 hardcover books
                                    </td>
                                    <td>
                                        $375 + 150 S/H
                                    </td>
                                </tr>
                            </table>

                            </div>


                            <div style="background-color: #cccccc; padding: 15px; margin-top:20px;margin-bottom:20px">
                                <h3>Publishing Information</h3>
                                <table class="table">
                                    <tr>
                                        <td>
                                            Expose 12 Hard Cover
                                        </td>
                                        <td>
                                            ISBN: 978-1-921002-98-4
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Expose 12 Leather limited Edition
                                        </td>
                                        <td>
                                            ISBN: 978-1-921002-99-1
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Expose 12 Extended eBook_1
                                        </td>
                                        <td>
                                            ISBN: 978-1-921828-00-3
                                        </td>
                                    </tr>
                                </table>
                                <p>Pages: 288 (All printed editions have the same number of pages.)</p>
                            </div>


                            <h3>When will my book ship</h3>
                            <p>As soon as the campaign closes we will finalize the book and get it to press as quickly as possible. Your book will be shrink-wrapped and mailed out in our mailing carton as quickly as possible after printing. From our experience it takes 8 – 12 weeks on average from printing to people receiving their books. Orders originating from USA will be sent from our Los Angeles Warehouse and those orders from the rest of the world, including Canada, will be sent from our warehouse in Horsham, Victoria. Australia.</p>

                            <h3>Targets</h3>
                            <p>We have a minimum target of 2,000 books. Once this is reached the project is a go and we will start preparing the book for print. We will keep the campaign going for a while after the minimum target is met so as many people as possible can get their orders in.</p>
                            <p><strong>There won’t be any more EXPOS 12 books printed after this campaign – the only way to get a book is to order it during the campaign.</strong></p>
                            <p>If for any reason the target is not met then everyone gets a refund … but we don’t expect this as previous editions have sold many thousands more than our current target of 2,000.</p>


                            <h3>New to Ballistic and EXPOSÉ – celebrating EXPOSÉ all around the world.</h3>
                            <p>EXPOSÉ is the first and premiere showcase for digital art and artists. Every year EXPOSÉ features the best digital art in the known universe. Since it launched in 2003 EXPOSÉ has been a global sensation… just take a look at these artists from previous editions celebrating EXPOSÉ all around the world.</p>
                            <p>See previews of the previous editions:
                                <ul>
                                    <li>
                                        <a href="http://www.ballisticpublishing.com/books/expose/expose_11/">
                                            EXPOSÉ 11
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://www.ballisticpublishing.com/books/expose/expose_10/">
                                            EXPOSÉ 10
                                        </a>
                                    </li>
                                </ul>
                            </p>
                            <p>To learn more about Ballistic Publishing’s history and other books visit <a href="http://www.ballisticpublishing.com/">Ballistic Publishing</a></p>

                            <h3>New stuff</h3>
                            <p>With the re-launch of Ballistic we are excited to bring a whole range of new products and benefits...</p>
                            <p><strong>EXTENDED editions are eBook extensions</strong> to the printed books. Every year we get over 6,000 entries but we only have room for 300 or so images in the books. With EXPOSÉ 12 we will bring out an extended edition as an eBook in the first quarter after the print book ships. It will feature an additional 300 or more artists in the same format as the print book.</p>
                            <p><strong>MEMBERSHIP</strong> includes a year’s exclusive access to artists, judges and other industry leaders via a series of monthly webinars through the year. Membership will also give you access and discounts for the growing range of EXPOSÉ products being released over the next 12 months.</p>

                            <?php //echo $project['description'] ?>


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
                                            <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $backer['email'] ) ) ); ?>?s=60" /> <?php echo  $backer['first_name']?> <?php echo  $backer['last_name']?> - Australia <br />
                                            
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
                        <h4 class="klavika-regular">Project Team</h4>

                        <p style="padding-left: 0;">Ballistic Publishing is headed up by the same people that started the company over 12 years ago. We are also lucky to have most of our team still with us. Together the team has many decades of combined Publishing experience.</p>
                        <ul>
                        <?php
                            foreach ($project['project_leaders'] as $project_leader) { ?>
                                <li>
                                    <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $project_leader['email'] ) ) ); ?>?s=60" />
                                    <h6><b><?php echo  $project_leader['first_name']?> <?php echo  $project_leader['last_name']?></b></h6>
                                    <p><?php echo $project_leader['email'] ; ?>
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
                                    <? } else { ?>
                                        (<?php if($project_reward['sold'] > 0){ echo  $project_reward['sold']?> sold, <?php } echo  $project_reward['quantity']-$project_reward['sold']?> left)                                    
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