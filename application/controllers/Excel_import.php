<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Excel_model');
		$this->load->library('excel');
	}

	public function index()
	{
		$this->load->view('excel_view');
	}

	public function fetch()
	{
		$data = $this->Excel_model->select();

		$output = "<h3 align='center'>Total Data -".$data->num_rows()."</h3>
		         <table class='table table-bordered'>
		         <thead>
		         <tr>
		             <th>Serial no</th>
		             <th>User Name</th>
		             <th>Date of birth</th>
		             <th>Address</th>
		             <th>Gender</th>
		         </tr>
		         </thead>
		         <tbody>";
		   foreach ($data->result_array() as $row) 
		   {
		   	   $output .= "<tr>";
		   	   $output .= "<td>".$row['id']."</td>";
		   	   $output .= "<td>".$row['full_name']."</td>";
		   	   $output .= "<td>".$row['dob']."</td>";
		   	   $output .= "<td>".$row['address']."</td>";
		   	   $output .= "<td>".$row['gender']."</td>";
		   	   $output .= "</tr>";
		   }

	    $output .="</tbody>
		           </table>";

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
                                         'full_name' => $customer_name,
                                         'dob' =>date('Y-m-d', strtotime($dob)),
                                         'Address' =>$address,
                                         'gender' =>$gender
                                       );
                                 }
                          }
                        $this->Excel_model->insert($data);
                        echo "Data Imported Successfully";
                   }
       }

   }


/* End of file Excel.php */
/* Location: ./application/controllers/Excel.php */