<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dataimport extends Public_Controller
{

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the model file
        $this->load->model('entry_model');

    }


    /**************************************************************************************
     * PUBLIC FUNCTIONS
     **************************************************************************************/


    /**
     * Default
     */
    public function index()
    {

        $json = file_get_contents("../data2.json");
//        $json = file_get_contents("http://www.cgsociety.org/ajax/expose12.php?view=entries&page=1&per=7000&bust=");

//        echo $json;
//        die;


        $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($json, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST);

        $found_start_of_users = 0;
        $new_entry=1;

        foreach ($jsonIterator as $key => $val) {
            if($key == 'users' && $found_start_of_users == 0){
                $found_start_of_users = 1;
            }
            if($found_start_of_users == 1) {
                if($new_entry==1){
                    $entry_data = array();
                    $new_entry=0;
                }
                if (!is_array($val)) {
                    if($key != 'json_custom_fields'){
                        $entry_data[$key] = $val;
                    }
                    if($key == 'custom_fields_address'){
                        if(!$this->entry_model->entry_exists($entry_data['art_id'])){
                            //save the data
                            $this->db->insert('entry', $entry_data);
                            echo "inserted</br>";
                        }else{
			//	$this->db->query("YOUR QUERY")->row()->fieldname;
				$id = $this->entry_model->get_id($entry_data['art_id']);
				$entry_data_update = array();
				$entry_data_update['title'] = $entry_data['title'];
				$entry_data_update['description'] = $entry_data['description'];
				$entry_data_update['csv_software'] = $entry_data['csv_software'];	
				$entry_data_update['country'] = $entry_data['country'];
				$this->db->where('id', $id);
				$this->db->update('entry', $entry_data_update);
			}
                        $new_entry=1;
                    }
                }
            }
        }
    }

}
