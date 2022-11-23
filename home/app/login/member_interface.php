<?php

interface memberable{
    public function enroll($username,$email,$password);
    public function getinformation();
    public function setinfomration();
}