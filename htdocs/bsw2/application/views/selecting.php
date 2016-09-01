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

        .modal-content {
            height: auto !important;
            min-height: 100% !important;
            border-radius: 0 !important;
        }

        .table li{
            padding:0;
            margin: 0px;
            border-bottom: 1px solid #cccccc;
            font-size: 24px;
            clear: both;
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
            echo "<li class='".$class."'><table class='table'>
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
                <button class=\"btn btn-default btn-xs\" id=\"accept_image\" aria-data='".$entry['art_id']."'>
                    <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
                    Accept</button><br/>
                <button class=\"btn btn-default btn-xs\" id=\"reject_image\" aria-data='".$entry['art_id']."'>
                    <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>
                    Reject</button><br/>
                <button class=\"btn btn-default btn-xs\" id=\"select_image\" aria-data='".$entry['art_id']."'>
                    <span class=\"glyphicon glyphicon-thumbs-up\" aria-hidden=\"true\"></span>
                    Select</button><br/>
                <button class=\"btn btn-default btn-xs\" id=\"backlog_image\" aria-data='".$entry['art_id']."'>
                    <span class=\"glyphicon glyphicon-folder-open\" aria-hidden=\"true\"></span>
                    Backlog</button><br/>
                <button class=\"btn btn-default btn-xs\" id=\"recat_image\" aria-data='".$entry['art_id']."'>
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

        // A $( document ).ready() block.
        $( document ).ready(function() {

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

            $(document).on("keypress", function (e){
                // alert(event.which);
                //zoom entry

                $('#recat_image').click(function(){
                    $('#recat').modal();
                    $('#recat').on('shown.bs.modal', function (e) {
                        $("#recat_category").focus();
                    });
                    select_recat();
                    document.activeElement.blur();
                    return false;
                });

                $('#accept_image').click(function(){
                    art_id = $(this).attr('aria-data');
                    accept_entry();
                    document.activeElement.blur();
                    return false;
                });
                $('#reject_image').click(function(){
                    reject_entry();
                    document.activeElement.blur();
                    return false;
                });

            });

        });

        function accept_entry(art_id) {
            $.get( "<?php echo base_url('api/acceptentry'); ?>", { art_id: art_id} )
                .done(function( data ) {
//                    $("#entry_status_accepted").show();
//                    setTimeout(next_entry,'1000');
                });

        }

        function change_cat(new_cat) {
            $.get( "<?php echo base_url('api/changecat'); ?>", { art_id: current_image_data.art_id, cat: new_cat } )
                .done(function( data ) {
                    $('#recat').modal('hide');
                    $("#cat_changed").show();
                    setTimeout(next_entry,'1000');
                });

        }

        function reject_entry() {
            $.get( "<?php echo base_url('api/rejectentry'); ?>", { art_id: current_image_data.art_id} )
                .done(function( data ) {
                    $("#entry_status_rejected").show();
                    setTimeout(next_entry,'1000');
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
