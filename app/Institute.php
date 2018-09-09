<?php

/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
*/
namespace App;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model {

	protected $table = 'institutes';
    public $timestamps = false;

//	protected $hidden = array('password');

}
