<?php

class Resource extends Eloquent {
	/**
	 * Fillable fields. To prevent MASS ASSIGNMENT of other fields
	 *
	 * @var string
	 */
	protected $fillable = array('description', 'link', 'level', 'title', 'categorie_id');

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function userResourceLink()
	{
		return $this->hasOne('UserResourceLink');
	}

	public function courseResourceLink()
	{
		return $this->hasMany('CourseResourceLink');
	}
}