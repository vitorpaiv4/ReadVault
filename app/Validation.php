<?php

class Validation {

    public $errors = [];

    public static function validate($rules, $data)
    {

        $validation = new self;

        foreach($rules as $field => $fieldRules) {

            foreach($fieldRules as $rule) {

                $fieldValue = $data[$field];

                if ($rule == 'confirmed') {

                    $validation->$rule($field, $fieldValue, $data["{$field}_confirmation"]);
                        
                } 
                
                else if (str_contains($rule, ':')) {

                    $temp = explode(':', $rule);

                    $rule = $temp[0];

                    $ruleArg = $temp[1];

                    $validation->$rule($ruleArg, $field, $fieldValue);

                }
                
                else {

                    $validation->$rule($field, $fieldValue);

                }

            }

        }

        return $validation;

    }

    private function required($field, $value)
    {

        if (strlen($value) == 0) {

            $this->errors[] = "The $field field is required.";
    
        }

    }

    private function email($field, $value)
    {

        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {

            $this->errors[] = "The $field field must be a valid email.";
    
        }

    }

    private function confirmed($field, $value, $confirmationValue)
    {

        if ($value != $confirmationValue) {

            $this->errors[] = "The $field confirmation does not match.";
    
        }

    }

    private function unique($table, $field, $value)
    {

        if (strlen($value) == 0) {

            return ;

        }

        $db = new Database(config('database'));

        $result = $db->query(

            query: "select * from $table where $field = :value",
            params: ['value' => $value]

        )->fetch();

        if ($result) {

            $this->errors[] = "The $field has already been taken.";

        }

    }

    private function min($min, $field, $value) {

        if (strlen($value) <= $min) {

            $this->errors[] = "The $field must be at least $min characters.";

        }

    }

    private function max($max, $field, $value) {

        if (strlen($value) > $max) {

            $this->errors[] = "The $field must not be greater than $max characters.";

        }

    }

    private function strong($field, $value)
    {

        if (! strpbrk($value, "!#$%&'()*+,-./:;<=>?@[\]^_`{|}~")) {

            $this->errors[] = "The $field must contain a special character.";
    
        }

    }

    public function fails($customName = null)
    {

        $key = 'errors';

        if ($customName) {

            $key .= '_' . $customName;

        }

        flash()->push($key, $this->errors);

        return sizeof($this->errors) > 0;

    }

}
