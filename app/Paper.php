<?php

/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
*/
namespace App;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model {

	protected $table = 'paper';
    public $timestamps = true;

//	protected $hidden = array('password');

}
