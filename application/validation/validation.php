<?php
namespace Application\validation;

class Validation {
    /**
     * Controller constructor
     */
    // function __construct($post = []) {
    //     $this->checkValudate($post);
    // }
    private $errors = [];

    public function checkValudate($post) {
        if(array_key_exists('name', $post)) {
            $this->errors['name'] = $this->emptyVal($post['name']);
        }
        if(array_key_exists('date', $post)) {
            $this->errors['date'] = $this->emptyVal($post['date']);
        }
        if(array_key_exists('email', $post)) {
            $this->errors['email'] = $this->emptyVal($post['email']);
        }
        if(array_key_exists('password', $post)) {
            $this->errors['password'] = $this->emptyVal($post['password']);
        }
        return $this->errors;
    }

    /**
     * @param array
     */
    private function emptyVal($val) {
        if(empty($val)) {
            return '空白です';
        }
    }
}