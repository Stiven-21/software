<?php
function validateDynamicInput(array $data, array $rules) {
    $errors = [];
    $allowedFields = array_keys($rules);

    foreach ($rules as $field => $validations) {
        $value = $data[$field] ?? null;

        if (empty($value) && !empty($validations['required']) && $value !== '0') {
            $errors[] = "El campo \"$field\" es obligatorio.";
            continue;
        }

        if (!empty($value) && !empty($validations['type'])) {
            $type = $validations['type'];
            $isValid = match ($type) {
                'integer' => filter_var($value, FILTER_VALIDATE_INT) !== false,
                'string' => is_string($value),
                'boolean' => is_bool(filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)),
                'array' => is_array($value),
                default => true,
            };

            if (!$isValid) {
                $errors[] = "El campo \"$field\" debe ser del tipo $type.";
            }
        }

        if (!empty($validations['maxLength']) && is_string($value) && strlen($value) > $validations['maxLength']) {
            $errors[] = "El campo \"$field\" no debe exceder " . $validations['maxLength'] . " caracteres.";
        }

        if (!empty($validations['minLength']) && is_string($value) && strlen($value) < $validations['minLength']) {
            $errors[] = "El campo \"$field\" debe tener al menos " . $validations['minLength'] . " caracteres.";
        }

        if (!empty($validations['minValue']) && $value < $validations['minValue']) {
            $errors[] = "El campo \"$field\" debe tener un valor mínimo de " . $validations['minValue'] . ".";
        }

        if (!empty($validations['maxValue']) && $value > $validations['maxValue']) {
            $errors[] = "El campo \"$field\" debe tener un valor máximo de " . $validations['maxValue'] . ".";
        }

        if (!empty($validations['regex']) && is_string($value)) {
            if (!preg_match($validations['regex'], $value)) {
                $errors[] = "El campo \"$field\" no cumple con el formato esperado.";
            }
        }
    }

    $extraFields = array_diff(array_keys($data), $allowedFields);
    if (!empty($extraFields)) {
        $errors[] = 'Se enviaron campos no permitidos: ' . implode(', ', $extraFields);
    }

    return $errors;
}
