<?php

class Fish extends Eloquent {

	protected $fillable = array('weight', 'bear_id');

	protected $table = 'fish';

	public function bear() {
		return $this->belongsTo('Bear');
	}
}