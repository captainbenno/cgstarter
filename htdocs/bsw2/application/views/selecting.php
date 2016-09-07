<?php defined('BASEPATH') OR exit('No direct script access allowed');

function translate_status($status)
{
    switch ($status) {
        case 0:
            return "unsorted";
            break;
        case 1:
            return "rejected";
            break;
        case 2:
            return "accepted";
            break;
        case 3:
            return "selected";
            break;
        case 4:
            return "backlog";
            break;
    }
}
?>


<?php if ($this->session->userdata('logged_in')){ ?>

    <style type="text/css">

        .modal-open .modal {
            overflow-x: auto !important;
            overflow-y: auto !important;
        }


        .modal-dialog {
            width: 100% !important;
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        div#recat .modal-dialog {
            width: 600px !important;
            height: 356px !important;
            margin: 0 auto !important;
            padding: 0 !important;
        }


        .modal-content {
            height: auto !important;
            min-height: 100% !important;
            border-radius: 0 !important;
        }

        div#recat .modal-content {
            height: 354px; !important;
            min-height: 354px !important;
            border-radius: 0 !important;
        }

        .table li{
            padding:0;
            margin: 0px;
            border-bottom: 1px solid #cccccc;
            font-size: 24px;
            clear: both;
            height: 177px;
        }

        #image-zoom{
            cursor: zoom-in;
        }

        .topten{
            background: #cccccc;
        }

        table.table{
            float:right;
        }

        table td{
            font-size: 12px;
        }

        .zoombtn{
            cursor: zoom-in;
        }

    </style>

    <h4>Current Role: <?php  echo $this->session->userdata('logged_in')['user_type'] ?></h4>

    <p>The images below are in order of voting:</p>

    <div id="votes_saved" style="display:none" class="alert alert-success" role="alert">Voting Saved!</div>

    <form method="get" id="cat_form">
        <div class="form-group">
            <label>
                Category:
                <select id="category" name="cat" class="form-control">
                    <?php
                    foreach($categories as $category){
                        $selected = "";
                        if($current_cat == $category['category_title']){
                            $selected = "selected";
                        }
                        echo "<option ".$selected.">".$category['category_title']."</option>";
                    }
                    ?>
                </select>
            </label>
            <label>
                Entry Status:
                <select name="status" id="status" class="form-control">
                    <option <?php if($current_status == 0){echo "selected";} ?> value="0">Unsorted</option>
                    <option <?php if($current_status == 1){echo "selected";} ?> value="1">Rejected</option>
                    <option <?php if($current_status == 2){echo "selected";} ?> value="2">Accepted</option>
                    <option <?php if($current_status == 3){echo "selected";} ?> value="3">Selected</option>
                    <option <?php if($current_status == 4){echo "selected";} ?> value="4">Backlog</option>
                </select>
            </label>
        </div>
    </form>


    <ol class="table">
        <?php
        $i = 0;
        foreach($entries as $entry){
            $class = "";
            if($i < 10){
                $class = "topten";
            }
            echo "<li class='".$class."'  aria-data='".$entry['art_id']."' ><table class='table'>
                        <tr>
                            <td>Image</td>
                            <td>Status</td>
                            <td>CGS Art ID</td>
                            <td>Category</td>
                            <td>Full Name</td>
                            <td>Address</td>
                            <td>Email</td>
                            <td>CGS User</td>
                            <td>Action</td>
                        </tr>
                        <tr>
                            <td>
                                <img class='zoombtn' aria-data-image='".$entry['image_large']."' aria-data='".$entry['art_id']."' style='width:120px;' src='".str_replace("_large.jpg","_thumb.jpg",$entry['image_large'])."'>
                            </td>
                            <td>".translate_status($entry['status'])."</td>
                            <td>".$entry['art_id']."</td>
                            <td>".$entry['category_title']."</td>
                            <td>".$entry['custom_fields_full_name']."</td>
                            <td>".$entry['custom_fields_address']."</td>
                            <td>".$entry['email']."</td>
                            <td>".$entry['username']."</td>
                            <td>                     
                                <button class=\"btn btn-default btn-xs accept_image\" aria-data='".$entry['art_id']."'>
                                    <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
                                    Accept</button><br/>
                                <button class=\"btn btn-default btn-xs reject_image\" aria-data='".$entry['art_id']."'>
                                    <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>
                                    Reject</button><br/>
                                <button class=\"btn btn-default btn-xs select_image\" aria-data='".$entry['art_id']."'>
                                    <span class=\"glyphicon glyphicon-thumbs-up\" aria-hidden=\"true\"></span>
                                    Select</button><br/>
                                <button class=\"btn btn-default btn-xs backlog_image\" aria-data='".$entry['art_id']."'>
                                    <span class=\"glyphicon glyphicon-folder-open\" aria-hidden=\"true\"></span>
                                    Backlog</button><br/>
                                <button class=\"btn btn-default btn-xs recat_image\" aria-data='".$entry['art_id']."'>
                                    <span class=\"glyphicon glyphicon-list\" aria-hidden=\"true\"></span>
                                    Re-Cat</button>
                            </td>
                        </tr>
                    </table>
                </li>";
            $i = $i+1;
        }
        ?>
    </ol>

    <!-- Modal -->
    <div class="modal fade" id="recat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Change Category</h4>
                </div>
                <div class="modal-body">
                    <p>Select an existing category or create a new one. This form uses tab navigation for speedy input. Press 'esc' to close without making any changes.</p>
                    <div class="form-group">
                        <form id="recat_form">
                            <label>
                                Category:
                                <select id="recat_category" class="form-control">
                                    <?php
                                    foreach($categories as $category){
                                        echo "<option>".$category['category_title']."</option>";
                                    }
                                    ?>
                                </select>
                            </label>
                            <br />
                            OR
                            <br/>
                            <label>
                                New Category:
                                <input class="form-control" id="new_cat" />
                            </label>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="save_cat" type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="zoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Zoom View</h4>
                </div>
                <div class="modal-body">
                    <p>This is the zoomed in view, you can actually zoom in even more to the original file that was uploaded and is usually larger simply by clicking on the image in this screen.
                        <br/>
                        This does however require some patience, it may look like it isn't doing anything, BUT it will evenutually load the larger sized image, give it 30 seconds or so.
                        <br>
                        If the larger image still does not show and the browser does not appear to be loading anything futher, then it has finished and what you are looking at is that the original image is on;y slightly larger than the originals.
                    </p>
                    <p>
                        To close this zoomed in window press the X in the top right hand corner or press the [esc] key on your keyboard.
                    </p>
                    <img id="image-zoom" src="" />
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        var current_art_id = 0;

        // A $( document ).ready() block.
        $( document ).ready(function() {

            $('#save_cat').click(function(){
                new_cat = $("#recat_category").val();
                if($("#new_cat").val().length>0){
                    new_cat = $("#new_cat").val();
                    console.log(new_cat);
                }
                change_cat(new_cat);
            })

            $("#save_order").click(function(){
                var art_ids = []
                $(".table li img").each(function(){
                    art_ids.push($(this).attr("aria-data"));
                });

                console.log(art_ids);

                save_vote('<?php echo $current_cat ?>',art_ids);
            });

            $('#category').change(function(){
                $("#cat_form").submit();
                return false;
            })
            $('#status').change(function(){
                $("#cat_form").submit();
                return false;
            })

            $('#image-zoom').click(function(){
                largeimage = $(this).attr("src");
                $('#image-zoom').attr('src','');
                $('#image-zoom').attr('src',largeimage.replace("_large.jpg","_orig.jpg"));
            })


            $('.zoombtn').click(function(){
                $('#zoom').modal();
                largeimage = $(this).attr("aria-data-image");
                $('#image-zoom').attr('src',largeimage);
            })


            $('.recat_image').click(function(){
                $('#recat').modal();
                current_art_id = $(this).attr('aria-data');
                $('#recat').on('shown.bs.modal', function (e) {
                    $("#recat_category").focus();
                    select_recat();
                });
                document.activeElement.blur();
                return false;
            });

            $('.accept_image').click(function(){
                art_id = $(this).attr('aria-data');
                accept_entry(art_id);
                return false;
            });

            $('.reject_image').click(function(){
                art_id = $(this).attr('aria-data');
                reject_entry(art_id);
                return false;
            });

            $('.select_image').click(function(){
                art_id = $(this).attr('aria-data');
                select_entry(art_id);
                return false;
            });

            $('.backlog_image').click(function(){
                art_id = $(this).attr('aria-data');
                backlog_entry(art_id);
                return false;
            });

        });

        function select_recat(){
            current_cat = "<?php echo $current_cat ?>";
            $("#recat_category").val(current_cat);
        }

        function backlog_entry(art_id) {
            $.get( "<?php echo base_url('api/backlogentry'); ?>", { art_id: art_id} )
                .done(function( data ) {
                    $("li[aria-data="+art_id+"]").css("border","3px solid orange");
                    $("li[aria-data="+art_id+"]").fadeTo(1000, 500).slideUp(500, function() {
                        $("li[aria-data="+art_id+"]").hide();
                    });
                });
        }

        function select_entry(art_id) {
            $.get( "<?php echo base_url('api/selectentry'); ?>", { art_id: art_id} )
                .done(function( data ) {
                    $("li[aria-data="+art_id+"]").css("border","3px solid green");
                    $("li[aria-data="+art_id+"]").fadeTo(1000, 500).slideUp(500, function() {
                        $("li[aria-data="+art_id+"]").hide();
                    });
                });
        }

        function accept_entry(art_id) {
            $.get( "<?php echo base_url('api/acceptentry'); ?>", { art_id: art_id} )
                .done(function( data ) {
                    $("li[aria-data="+art_id+"]").css("border","3px solid blue");
                    $("li[aria-data="+art_id+"]").fadeTo(1000, 500).slideUp(500, function() {
                        $("li[aria-data="+art_id+"]").hide();
                    });
                });

        }

        function change_cat(new_cat) {
            art_id = current_art_id;
            $.get( "<?php echo base_url('api/changecat'); ?>", { art_id: art_id, cat: new_cat } )
                .done(function( data ) {
                    $('#recat').modal('hide');
                    $("li[aria-data="+art_id+"]").css("border","3px solid purple");
                    $("li[aria-data="+art_id+"]").fadeTo(1000, 500).slideUp(500, function() {
                        $("li[aria-data="+art_id+"]").hide();
                    });
                });

        }

        function reject_entry(art_id) {
            $.get( "<?php echo base_url('api/rejectentry'); ?>", { art_id: art_id} )
                .done(function( data ) {
                    $("li[aria-data="+art_id+"]").css("border","3px solid red");
                    $("li[aria-data="+art_id+"]").fadeTo(1000, 500).slideUp(500, function() {
                        $("li[aria-data="+art_id+"]").hide();
                    });

                });

        }


        /*            .fail(function() {
         alert( "error" );
         })
         .always(function() {
         alert( "finished" );
         });
         */

    </script>

<?php }?>
