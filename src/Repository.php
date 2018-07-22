<?php
namespace Console;

class Repository {

  static function MongoRipository($data) {

  }

  static function FileRepository($data){

        $myFile = "data.json";
        
        $arr_data = array(); // create empty array
        try
        {
           //Get data from existing json file
           $jsondata = file_get_contents($myFile);

           if(empty($jsondata)){
              $jsondata = array();
           }

           // converts json data into array
           $arr_data = json_decode($jsondata, true);
           $data = json_decode($data, true);

           if(empty($data)){
              die('No Data found');
           }

           // Push user data to array
           array_push($arr_data,$data);

           //Convert updated array to JSON
           $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
           
           //write json data into data.json file
           if(file_put_contents($myFile, $jsondata)) {
                echo 'Data successfully saved';
            }
           else 
                echo "error";

           }
           catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
           }
  }
}



// interface Repository {
// 	static function save($data);
// }

// class MongoRipository implements Repository {
// 	static function save($data)
// 	{
    
// 	}

// }

// class FileRipository implements Repository {
	
// 	static public function save($data)
// 	{
// 		$myFile = "data.json";
//         $arr_data = array(); // create empty array
//         try
//         {
//            //Get data from existing json file
//            $jsondata = file_get_contents($myFile);

//            // converts json data into array
//            $arr_data = json_decode($jsondata, true);
//            $data = json_decode($data, true);

//            // Push user data to array
//            array_push($arr_data,$data);

//            //Convert updated array to JSON
//            $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
           
//            //write json data into data.json file
//            if(file_put_contents($myFile, $jsondata)) {
//                 echo 'Data successfully saved';
//             }
//            else 
//                 echo "error";

//            }
//            catch (Exception $e) {
//                     echo 'Caught exception: ',  $e->getMessage(), "\n";
//            }
// 	}

// }