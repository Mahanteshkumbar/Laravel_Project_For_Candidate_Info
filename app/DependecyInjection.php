<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class DependecyInjection extends Model
{
    
    public function __construct(){
    	echo "Hi to DependecyInjection from model";
    }

    public function mm(){
    	echo('hii from modelss');
    }
}
