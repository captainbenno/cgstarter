
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Default Public Template
 */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="shortcut icon" type="image/png" href="/favicon-16x16.png">
    <title><?php echo $this->settings->site_name; ?> - <?php echo $page_title; ?></title>
    <meta name="keywords" content="these, are, keywords">
    <meta name="description" content="This is the site description.">

    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.3/normalize.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css?v=3.2.4">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css?v=3.2.4">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css?v=3.2.4">
    <link rel="stylesheet" href="/themes/core/css/core.css?v=3.2.4">
    <link rel="stylesheet" href="/themes/default/css/default.css?v=3.2.4">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

    <! -- other -->
    <?php if (isset($css_files) && is_array($css_files)) : ?>
        <?php foreach ($css_files as $css) : ?>
            <?php if ( ! is_null($css)) : ?>
                <link rel="stylesheet" href="<?php echo $css; ?>?v=<?php echo $this->settings->site_version; ?>"><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js?v=3.2.4"></script>
                                                
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js?v=3.2.4"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=242282062472425";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- beginning of nav -->
    <nav id="top-nav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <?php if ($this->user['is_admin']) : ?>
                            <li>
                                <a href="<?php echo base_url('admin'); ?>">Admin</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="/logout">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="<?php echo (uri_string() == 'login') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('/login'); ?>">Login</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <li class="<?php echo (uri_string() == 'profile') ? 'active' : ''; ?>"><a href="<?php echo base_url('/profile'); ?>"><?php echo lang('core button profile'); ?></a></li>
                    <?php else : ?>
                        <li class=""><a href="<?php echo base_url('/user/register'); ?>">Register</a></li>
                    <?php endif; ?>                    
                </ul>
                <?php if($this->cart->total() > 0){ ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?php echo (uri_string() == 'login') ? 'active' : ''; ?>">
                            <a class="mini-cart" role="buton" href="<?php echo base_url('/cart/'); ?>">
                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                             $<?php echo $this->cart->total(); ?></a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
    <nav id="main-nav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div id="navbar-main">
                <a class="navbar-brand" href="/"><span>CG-Starter</span></a>
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php echo (uri_string() == '') ? 'active' : ''; ?>"><a href="/">Home</a></li>                    
                    <li class="<?php echo (uri_string() == 'about') ? 'active' : ''; ?>"><a href="/about">About</a></li>
                    <li class="<?php echo (uri_string() == 'project/expose12') ? 'active' : ''; ?>"><a href="/project/expose12">Projects</a></li>
                    <li class="<?php echo (uri_string() == 'contact') ? 'active' : ''; ?>"><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="title-spacer-container">
    </div>
    <?php // System messages ?>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php elseif (validation_errors()) : ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo validation_errors(); ?>
        </div>
    <?php elseif ($this->error) : ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $this->error; ?>
        </div>
    <?php endif; ?>

    <?php // Main content ?>
    <?php echo $content; ?>

    <?php // Footer ?>
   <footer>
        <div class="container-fluid">
            <div class="row" id="footer-1">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <img src="/themes/default/img/cgstarter-logo-small.png" />
                    <p>Crowd funded CG projects for all of humanity and beyond.</p>
                </div>
                <div class="col-md-2" id="tweets-feed">
                    <h4>Recents Tweets</h4>
                    <a class="twitter-timeline" href="https://twitter.com/damirdokic" data-widget-id="737237435642347520">Tweets by @damirdokic</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
                <div class="col-md-2" id="facebook-feed">
                    <h4>Facebook Feed</h4>
                    <div class="fb-page" 
                        data-href="https://www.facebook.com/ballisticpublishing/" 
                        data-tabs="timeline" 
                        data-small-header="false" 
                        data-adapt-container-width="true" 
                        data-hide-cover="true" 
                        data-show-facepile="true" 
                        data-height="300"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ballisticpublishing/"><a href="https://www.facebook.com/ballisticpublishing/">Ballistic Publishing</a></blockquote></div></div>
                </div>
                <div class="col-md-2" id="footer-menu">
                    <h4>Menu</h4>
                    <ul>
                        <li>
                            <a href="/about">About and FAQ</a>
                        </li>
                        <li>
                            <a href="/privacy">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="/terms">Terms and Conditions</a>
                        </li>
                        <li>
                            <a href="/shipping">Shipping and Returns</a>
                        </li>
                        <li>
                            <a href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" id="footer-2">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                     <img src="/themes/default/img/cgsociety-power-logo.png" />
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-2"></div>            
            </div>
        </div>
    </footer>
    <!-- end of footer -->
                                      

<script type="text/javascript">
/**
 * Configurations
 */
var config = {
    logging : true,
    baseURL : location.protocol + "//" + location.hostname + "/"
};


/**
 * Bootstrap IE10 viewport bug workaround
 */
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement('style')
    msViewportStyle.appendChild(
        document.createTextNode(
            '@-ms-viewport{width:auto!important}'
        )
    )
    document.querySelector('head').appendChild(msViewportStyle)
}


/**
 * Execute an AJAX call
 */
function executeAjax(url, data, callback) {
    $.ajax({
        type     : 'POST',
        url      : url,
        data     : data,
        dataType : 'json',
        async    : true,
        success  : function(results) {
            callback(results);
        },
        error    : function(error) {
            alert("Error " + error.status + ": " + error.statusText);
        }
    });
    // prevent default action
    return false;
}


/**
 * Global core functions
 */
$(document).ready(function() {

    /**
     * Session language selected
     */
    $('#session-language-dropdown a').click(function(e) {
        // prevent default behavior
        if (e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }

        // set up post data
        var postData = {
            language : $(this).attr('rel')
        };

        // define callback function to handle AJAX call result
        var ajaxResults = function(results) {
            if (results.success) {
                location.reload();
            } else {
                alert("There was a problem setting the language!");
            }
        };

        // perform AJAX call
        executeAjax(config.baseURL + 'ajax/set_session_language', postData, ajaxResults);
    });
    

});

</script>

    <script type="text/javascript" src="/themes/default/js/custom.js"></script>
    <script type="text/javascript" src="/themes/default/js/jquery.montage.min.js"></script>

    <script type="text/javascript">
/**
 * Default theme functions
 */
$(document).ready(function() {

});

</script>
                        
</body>
</html>
