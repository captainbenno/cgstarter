<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<?php if ($this->session->userdata('logged_in')){ ?>

    <h4>Current Role: <?php  echo $this->session->userdata('logged_in')['user_type'] ?></h4>

    <p>Instructions for judging</p>

    <div id="entry_status_accepted" style="display:none" class="alert alert-success" role="alert">Image Accepted!</div>
    <div id="entry_status_rejected" style="display:none" class="alert alert-danger" role="alert">Image Rejected!</div>
    <div id="cat_changed" style="display:none" class="alert alert-success" role="alert">Category Changed!</div>

    <table class="table">
        <tbody>
        <?php
            foreach($entries as $entry){
                echo "<tr><td>".$entry['image_large']."</td></tr>";
            }
        ?>
        </tbody>
    </table>

    <?php print_r($entries); ?>


    <script type="text/javascript">

        // A $( document ).ready() block.
        $( document ).ready(function() {

            ('table tbody').sortable({
                placeholderClass: 'tr'
            });



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
