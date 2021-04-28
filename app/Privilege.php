<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
	protected $table = 'Privilege';
	protected $primaryKey = 'privilegeId';
	
	protected $fillable = [
						'privilege'
						];
	
	public $timestamps = false;
	
	public function selectPrivilege(){
		$query = Privilege::Select()
		->orderBy("privilege")
		->get();
		return $query;
	}


	
}