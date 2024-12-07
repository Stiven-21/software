<?php
    function validateFormData($data, $form, $type) {
        if($type !== 'create' && $type !== 'update') {
            return apiResponse(400, "Ha ocurrido un error con el fomulario ", $type);
        }

        $rules = require './validations/forms.php';
        $validate_form = ($type === 'create') ? $rules[$form] : makeRulesOptional($rules[$form]);

        // echo json_encode($validate_form);

        $errors = validateDynamicInput($data, $validate_form);
    
        if (!empty($errors)) {
            return apiResponse(400, "Ha ocurrido un error con el fomulario", $errors);
        }
    }