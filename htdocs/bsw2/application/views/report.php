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


        <?php
        $i = 0;
        $j = 0;
        $temp_cat = '';
        foreach($entries as $entry){
            $i = $i+1;
            if($temp_cat != $entry['category_title']){
                $temp_cat = $entry['category_title'];
                $j = 0;
                if($i>1){
                    echo "</ol>";
                }
                echo '<h3>'.$entry['category_title'].'</h2>';
                echo '<ol class="table">';
            }
            $j = $j+1;
            if($j<11){

                echo "<li aria-data='".$entry['art_id']."' ><table class='table'>
                            <tr>
                                <td>Image</td>
                                <td>Tally</td>
                                <td>Status</td>
                                <td>CGS Art ID</td>
                                <td>Category</td>
                                <td>Full Name</td>
                                <td>Address</td>
                                <td>Email</td>
                                <td>CGS User</td>
                            </tr>
                            <tr>
                                <td>
                                    <img class='zoombtn' aria-data-image='".$entry['image_large']."' aria-data='".$entry['art_id']."' style='width:120px;' src='".str_replace("_large.jpg","_thumb.jpg",$entry['image_large'])."'>
                                </td>
                                <td>".$entry['position']."</td>
                                <td>".translate_status($entry['status'])."</td>
                                <td>".$entry['art_id']."</td>
                                <td>".$entry['category_title']."</td>
                                <td>".$entry['custom_fields_full_name']."</td>
                                <td>".$entry['custom_fields_address']."</td>
                                <td>".$entry['email']."</td>
                                <td>".$entry['username']."</td>
                               
                            </tr>
                        </table>
                    </li>";
            }

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

            $('#save_cat').click(function () {
                new_cat = $("#recat_category").val();
                if ($("#new_cat").val().length > 0) {
                    new_cat = $("#new_cat").val();
                    console.log(new_cat);
                }
                change_cat(new_cat);
            })

            $('#category').change(function () {
                $("#cat_form").submit();
                return false;
            })
            $('#status').change(function () {
                $("#cat_form").submit();
                return false;
            })

            $('#image-zoom').click(function () {
                largeimage = $(this).attr("src");
                $('#image-zoom').attr('src', '');
                $('#image-zoom').attr('src', largeimage.replace("_large.jpg", "_orig.jpg"));
            })


            $('.zoombtn').click(function () {
                $('#zoom').modal();
                largeimage = $(this).attr("aria-data-image");
                $('#image-zoom').attr('src', largeimage);
            })
        });


        /*            .fail(function() {
         alert( "error" );
         })
         .always(function() {
         alert( "finished" );
         });
         */

    </script>

<?php }?>
