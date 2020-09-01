How to import excel file into database in codeigniter?

This project is to implement how the excel file can be imported into the database by using PHPExcel library in codeigniter. Display of table uploaded into the database is displayed by ajax call.

Steps followed to implement this project as follows:

Step 1: create a database and user table with input fields: full name, date of birth, address, gender.

Step 2: Enter database connection credentials in codeigniter folder.

Step 3: Edit the base url of the folder.

Step 4: Edit autoload.php libraries as "database", "session". Also edit helper as 'url' and 'form'.

Step 5: Download PHPExcel library and save it in libries folder of codeigniter.

Step 6: create an excel file named excel.php initalize the class of PHPExcel
<?php
if(!defined('BASEPATH')) exit('No direct script access all');
require_once('PHPExcel.php');
class Excel extends PHPExcel{
  public function __construct()
  {
       parent::construct(); 
   }
}

Step 7: Create a controller named Excel_import extending CI_controller.
           inside controller class
           public function __construct()
            {    
                    parent::__construct();  
                     $this->load->model('Excel_model');
                     $this->load->library('excel');
              }

          public function index()
          {
                $this->load->view('excel_view');
            }

         public function fetch()
         {
              $data = $this->excel_import_model->select();
              $output = '<h3 align="center">Total Data -'.$data->num_rows().'</h3>
                        <table class="table table-striped table-bordered">
                             <tr>
                                    <th>Customer Name</th>
                                     <th>Date of birth</th>
                                     <th>Address </th>
                                     <th>Gender</th>
                                  </tr>';
                            foreach($data->result() as $row)
                            {
                                  $output .='
                                   <tr>
                                          <td>'.$row->full_name.'</td>
                                           <td>'.$row->dob.'</td>
                                           <td>'.$row->address.'</td>
                                            <td>'.$row->gender.'</td>
                                   </tr>';
                             }
                         $output .= </table>;
                        echo $output;
         }
         
        public function import()
        {
                 if(isset($_FILES['file']['name']))
                  {
                        $path = $_FILES['file']['tmp_name'];
                        //create a class PHPExcel_IOFactory::load($path)
                        $object = PHPExcel_IOFactory::load($path);
                        foreach($object->getWorksheetIterator() as $worksheet)
                        {
                                //get highest worksheet row
                                $highestRow = $worksheet->getHighestRow();
                                //get highest worksheet column
                                $highestColumn = $worksheet->getHighestColumn();
                                for($row=2; $row<=$highestRow; $row++)
                                { 
                                    $customer_name = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
                                     $dob = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
                                     $address = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
                                     $gender = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
                                     $data[] = array(
                                         'customer_name' => $customer_name,
                                         'dob' =>$dob,
                                         'Address' =>$address,
                                         'gender' =>$gender
                                       );
                                 }
                          }
                        $this->excel_import_model->insert($data);
                        echo "Data Imported Successfully";
                   }
       }

Step 8: Create a model to handle Excel_import operation.
                 function select()
                 {
                     $this->db->order_by('CustomerID', 'DESC');
                     $query = $this->db->get('tbl_customer');
                     return $query;  
                }

                function insert()
                {
                      $this->db->insert_batch('tbl_customer',$data);
                }

Step 9: Create a view to display  the browser output file.
              Create a form 
             <form method="post"  id="import_form" enctype="multipart/form-data">
                 <p><label>Select Excel File </label>
                   <input type="file" name="file" id="file" required accept=".xls,.xlsx"/></p>
                    <input type="submit" name="import" value="Import" class="btn btn-info">
             </form>

             //define table responsive.
             jquery  ajax function to load the data from the table
             $(document).ready(function(){
                   load_data();
                  function load_data()
                   {
                            $.ajax({
                              'url':"<?php echo base_url(); ?>excel_import/fetch()";
                               method: "POST",
                               success:function(data){
                                  $('#customer_data').html(data);
                                 }
                               })
                   }
       
            $('#import_form').on('submit', function(event){
               event.preventDefault();
               $.ajax({
                   url:"<?php echo base_url(); ?>excel_import/import";
                   method: "POST"
                   data:new FormData(this), //to send data to the server in key pair values
                   contentType:false,
                   cache:false, //disable cashe requests
                   processData: false
                   success:function(data){
                        $('#file').val("");
                         load_data();   //displays data fresh from databse
                         alert(data);
                    }
                    
               })
            })
             }):
