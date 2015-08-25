<?php
class Tree extends Eloquent {
	protected $fillable = array('type', 'age', 'bear_id');

	public function bear() {
		return $this->belongsTo('Bear');
	}
}