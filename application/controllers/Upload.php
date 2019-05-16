<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {
       
        public function index()
        {
                $this->load->view('upload');
        }
        
     
        /*
        public function upload_file(){				
		//Config the parameters to upload the file to the server.
		//Configuramos los parametros para subir el archivo al servidor.		
		$config['upload_path'] = realpath(APPPATH.'../files');		
		$config['allowed_types'] = 'xls';
		$config['max_size']	= '0';			

		//Load the Upload CI library 
		//Cargamos la libreria CI para Subir
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file') ){		
			//Displaying Errors.
			//Mostramos los errores.
			print_r($this->upload->display_errors());						
		}
		else{
			//Uploads the excel file and read it with the PHPExcel Library.
			//Subimos el archivo de excel y lo leemos con la libreria PHPExcel.
			$data = array('upload_data' => $this->upload->data());			
			$this->load->library('excel');
			$excel = $this->excel->read_file($data['upload_data']['file_name']);
		}		
		
		//The file stored in the server will be deleted, we don't need it anymore.
		//El archivo almacenado en el servidor sera eliminado, no lo necesitamos mas.
		unlink($config['upload_path'].'/'.$data['upload_data']['file_name']);			
		
		//Set the array result from the library function and pass it to the view.
		//Asignamos el arreglo resultante de la funcion de la libreria y lo pasamos a la vista.
		$data['excel'] = $excel;

		$this->load->view('view', $data);	
	}
        
         * 
         */
}