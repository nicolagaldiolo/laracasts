<?php

    // Create a class
    Class Task 
    {

        protected $description;
        protected $completed = false;

        public function __construct($description = null)
        {
            if($description){
                $this->description = $description;
            }
        }

        public function isComplete(){
            return $this->completed;
        }

        public function complete(){
            $this->completed = true;
        }

        public function getDescription()
        {
            return $this->description;
        }
    }