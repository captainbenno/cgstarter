<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<?php if ($this->session->userdata('logged_in')){ ?>

    <h4>Current Role: <?php  echo $this->session->userdata('logged_in')['user_type'] ?></h4>

    <p>This area gives you the ability to sort, cull, and recategorise entries, using the keyboard short cuts is the fatest way to get through them.</p>

    <div id="entry_status_accepted" style="display:none" class="alert alert-success" role="alert">Image Accepted!</div>
    <div id="entry_status_rejected" style="display:none" class="alert alert-danger" role="alert">Image Rejected!</div>
    <div id="cat_changed" style="display:none" class="alert alert-success" role="alert">Category Changed!</div>

    <form>
        <div class="form-group">
            <label>
               Category:
               <select id="category" class="form-control">
                   <?php
                        foreach($categories as $category){
                            echo "<option>".$category['category_title']."</option>";
                        }
                   ?>
               </select>
            </label>

            <label>
                Entry Status:
                <select id="status" class="form-control">
                    <option value="0">Unsorted</option>
                    <option value="1">Rejected</option>
                    <option value="2">Accepted</option>
                    <option value="3">Selected</option>
                    <option value="4">Backlog</option>
                </select>
            </label>

            <label>
                <button class="btn btn-default" id="prev_image">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    Prev</button>
                <button class="btn btn-default" id="next_image">
                    Next (space)
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </button>
                <button class="btn btn-default" id="accept_image">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    Accept (A)</button>
                <button class="btn btn-default" id="reject_image">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    Reject (R)</button>
                <button class="btn btn-default" id="zoom_image">
                    <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
                    Zoom-in (Z)</button>
                <button class="btn btn-default" id="unzoom_image">
                    <span class="glyphicon glyphicon-zoom-out" aria-hidden="true"></span>
                    Zoom-out (X)</button>
                <button class="btn btn-default" id="recat_image">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    Re-Cat (C)</button>
            </label>
        </div>
    </form>

    <div class="container">
        <div class="row">
            <div class="col-sm-6" id="entry">
            </div>
            <div class="col-sm-6" id="entry_data">
            </div>
        </div>
    </div>


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

    <div id="preload_entry" style="height:1px;width:1px;position:absolute;top:-20000px;">

    </div>

    <script type="text/javascript">
        var current_index = 0;
        var current_image_data = '';
        var next_image_data = '';
        var next_index = current_index;
        var index_cnt = 0;

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

            $('#prev_image').click(function(){
                current_index = current_index - 1;
                get_entry()
                document.activeElement.blur();
                return false;
            });

            $('#recat_image').click(function(){
                $('#recat').modal();
                $('#recat').on('shown.bs.modal', function (e) {
                    $("#recat_category").focus();
                });
                select_recat();
                document.activeElement.blur();
                return false;
            });


            $('#next_image').click(function(){
                next_entry();
                document.activeElement.blur();
                return false;
            });

            $('#accept_image').click(function(){
                accept_entry();
                document.activeElement.blur();
                return false;
            });
            $('#reject_image').click(function(){
                reject_entry();
                document.activeElement.blur();
                return false;
            });

            $('#zoom_image').click(function(){
                write_zoom();
                document.activeElement.blur();
                return false;
            });

            $('#unzoom_image').click(function(){
                write_unzoom();
                document.activeElement.blur();
                return false;
            });

            $('#category').change(function(){
                current_index = 0;
                get_entry();
                document.activeElement.blur();
                return false;
            })

            $('#status').change(function(){
                current_index = 0;
                get_entry();
                document.activeElement.blur();
            })

            $(document).on("keypress", function (e){
               // alert(event.which);
                //zoom entry

                if($('#recat').css('display') == 'none'){

                    if ( event.which == 99 ) {
                        $('#recat').modal();
                        $('#recat').on('shown.bs.modal', function (e) {
                            $("#recat_category").focus();
                        });
                        select_recat();
                    }
                    //zoom entry
                    if ( event.which == 120 ) {
                        write_unzoom();
                    }
                    //zoom entry
                    if ( event.which == 122 ) {
                        write_zoom();
                    }
                    //next entry
                    if ( event.which == 32 ) {
                        current_index = current_index + 1;
                        get_entry();
                    }
                    if ( event.which == 97 ) {
                        accept_entry();
                    }
                    if ( event.which == 114 ) {
                        reject_entry();
                    }
                }

            });

            get_entry();

        });

        function select_recat(){
            current_cat = current_image_data.category_title;
            $("#recat_category").val(current_cat);


        }

        function write_preview(){
            $("#zoomedimage").hide();
            var entry_html = "<img style='width:100%' src='"+(current_image_data.image_large)+"' />";
            $("#entry").html(entry_html);
            var entry_data_html = "<table class='table'>";
            entry_data_html = entry_data_html+"<tr><td>Current Image No.</td><td>"+current_index+"</td></tr>";
            entry_data_html = entry_data_html+"<tr><td>Category</td><td>"+current_image_data.category_title+"</td></tr>";
            entry_data_html = entry_data_html+"<tr><td>Artist</td><td>"+current_image_data.custom_fields_full_name+"</td></tr>";
            entry_data_html = entry_data_html+"<tr><td>Email</td><td>"+current_image_data.email+"</td></tr>";
            entry_data_html = entry_data_html+"<tr><td>Address</td><td>"+current_image_data.custom_fields_address+"</td></tr>";
            entry_data_html = entry_data_html+"</table>";
            $("#entry_data").html(entry_data_html);
        }


        function write_preload(){
            var entry_html = "<img style='width:100%' src='"+(next_image_data.image_large)+"' />";
            $("#preload_entry").append(entry_html);
            console.log('completed preload '+next_image_data.image_large);
            get_nextentry();
        }

        function write_zoom(){
            var entry_html = "<img style='position:absolute;top:0;left:0' src='"+current_image_data.image_orig+"' id='zoomedimage' />";
            $(entry_html).insertAfter("body");
        }

        function write_unzoom(){
            write_preview();
        }

        function accept_entry() {
            $.get( "<?php echo base_url('api/acceptentry'); ?>", { art_id: current_image_data.art_id} )
                .done(function( data ) {
                    $("#entry_status_accepted").show();
                    setTimeout(next_entry,'1000');
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

        function next_entry(){
            current_index = current_index + 1;
            get_entry();
        }

        function get_entry(){

            selected_cat = $('#category').val();
            selected_status = $('#status').val();

            $.get( "<?php echo base_url('api/entry'); ?>", { cat: selected_cat, status: selected_status, index: current_index } )
                .done(function( data ) {
                    console.log(data);
                    if(data =='end'){
                        alert('You have reached the end of this category');
                    } else {
                        current_image_data = data;
                        write_preview();
                        $("#entry_status_accepted").hide();
                        $("#entry_status_rejected").hide();
                        $("#cat_changed").hide();
                        index_cnt = 0;
                        get_nextentry();
                    }
                });

        }

        function get_nextentry(){
            index_cnt = index_cnt+1;
            if(index_cnt < 20){
                next_index = next_index+1;
                selected_cat = $('#category').val();
                selected_status = $('#status').val();
                $.get( "<?php echo base_url('api/entry'); ?>", { cat: selected_cat, status: selected_status, index: next_index } )
                    .done(function( data ) {
                        next_image_data = data;
                        write_preload();
                    });
            }

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
