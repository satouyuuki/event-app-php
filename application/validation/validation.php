<?php
namespace Application\validation;

class Validation {
    /**
     * Controller constructor
     */
    private $errors = [];

    public function checkValudate($post) {
        if(array_key_exists('name', $post)) {
            if($this->emptyVal($post['name']) !== null) {
                $this->errors['name'] = $this->emptyVal($post['name']);
            }
            elseif($this->overMaxLength($post['name']) !== null) {
                $this->errors['name'] = $this->overMaxLength($post['name']);
            }
        }
        if(array_key_exists('date', $post)) {
            if($this->emptyVal($post['date']) !== null) {
                $this->errors['date'] = $this->emptyVal($post['date']);
            }
        }
        if(array_key_exists('email', $post)) {
            if($this->emptyVal($post['email']) !== null) {
                $this->errors['email'] = $this->emptyVal($post['email']);
            }
        }
        if(array_key_exists('password', $post)) {
            if($this->emptyVal($post['password']) !== null) {
                $this->errors['password'] = $this->emptyVal($post['password']);
            }
        }
        return $this->errors;
    }

    
    private function emptyVal($val) {
        if(empty($val)) {
            return '空白です';
        }
    }

    private function overMaxLength($val) {
        if(strlen($val) > 110) {
            return '文字数がオーバーしてます';
        }
    }
}