<?php



trait Validation {

    function validate($data) {
        $errors = [];
        
        // Validate data
        if( !$data['email'] ) {
            $errors['error'] = 'Email is required'; 
        } elseif ( !filter_var($data['email'], FILTER_VALIDATE_EMAIL) ) {
            $errors['error'] = 'Invalid email';
        }  
        
        if( empty($data['name'])||strlen($data['name'])<4 ) {
            $errors['error'] = 'Name is required'; 
        }

        if(!empty($errors)){
            return $errors;
        }
    
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars(trim($value));   
    }    
        return $data; 
    }
}