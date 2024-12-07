<?php
    function makeRulesOptional(array $rules): array {
        foreach ($rules as $field => &$validations) {
            if (isset($validations['optional']) && $validations['optional'] === true) {
                continue;
            }

            unset($validations['required']);
            
            $validations['optional'] = true;
        }
        return $rules;
    }
