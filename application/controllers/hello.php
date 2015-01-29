<?php

class Hello extends CI_Controller{
    
 
        
        function view ($page= 'home'){
            if(! file_exists('application/views/'.$page.'.php')){
                
                show_404();
            }
            
          $this->load->view($page);
        }
    
    
}

