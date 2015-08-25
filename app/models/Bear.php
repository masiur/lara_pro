<?php

class Bear extends Eloquent {
	// we want only these three attribute able to be filled 
	protected $fillable = array('name', 'type', 'danger_level' );

	// each nbear has one fish to eat 
	public function fish() {
		return $this->hasOne('Fish');
	}

	// each bear climbs many trees 
	public function trees() {
		return $this->hasMany('Tree');
	}
	// each bear belongs to many picnic 
	public function picnics () {
		return $this->belongsToMany('Picnic', 'bears_picnic', 'bear_id', 'picnic_id');
	}
}