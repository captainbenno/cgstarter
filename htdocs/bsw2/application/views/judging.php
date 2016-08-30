<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


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
            padding-bottom: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #cccccc;
            font-size: 24px;
        }

        #image-zoom{
            cursor: zoom-in;
        }
    </style>

    <h4>Current Role: <?php  echo $this->session->userdata('logged_in')['user_type'] ?></h4>

    <p>Drag the images into the order of preference, 1 being the highest.</p>

    <div id="entry_status_accepted" style="display:none" class="alert alert-success" role="alert">Judging Saved!</div>

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
        </div>
    </form>


    <ol class="table">
        <?php
            foreach($entries as $entry){
                echo "<li><img style='width:120px;' src='".str_replace("_large.jpg","_thumb.jpg",$entry['image_large'])."'>
                     <button class=\"zoombtn btn btn-default\" aria-data='".$entry['image_large']."'>
                    <span class=\"glyphicon glyphicon-zoom-in\" aria-hidden=\"true\"></span>
                    </button>                
                </li>";
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

            $('.table').sortable();

            $('#category').change(function(){
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
                largeimage = $(this).attr("aria-data");
                $('#image-zoom').attr('src',largeimage);
            })

            $(document).on("keypress", function (e){
               // alert(event.which);
                //zoom entry

                if($('#recat').css('display') == 'none'){

                    if ( event.which == 99 ) {
                    }
                }

            });

        });



        function get_entry(){

            selected_cat = $('#category').val();
            selected_status = $('#status').val();

            $.get( "<?php echo base_url('api/entry'); ?>", { cat: selected_cat, status: selected_status, index: current_index } )
                .done(function( data ) {
                    current_image_data = data;
                    write_preview();
                    console.log(data);
                    $("#entry_status_accepted").hide();
                    $("#entry_status_rejected").hide();
                    $("#cat_changed").hide();
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
