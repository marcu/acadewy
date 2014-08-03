<?php

class Categorie extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * Fillable fields. To prevent MASS ASSIGNMENT of other fields
	 *
	 * @var string
	 */
	protected $fillable = array('name', 'parent_id', 'description');


	public function childrenCategories() {
		return Categorie::where('parent_id', $this->id)->get();
	}

	public function parentCategorie() {
		return Categorie::where('id', $this->parent_id)->get();
	}

	/**
	 * All the descendant categories ( recursive ) in an Array
	 */
	public function descendantCategoriesArray() {
		$subCategories = $this->childrenCategories();

		$ret = array();
		array_push($ret, $this);

		foreach ($subCategories as $c) {	
			$ret = array_merge($ret, $c->descendantCategoriesArray());
		}

		return $ret;
	}

	/**
	 * All the descendant categories id ( recursive ) in an Array
	 */
	public function descendantCategoriesIdArray() {
		function getId($c) 
		{
			return $c->id;
		}

		return array_map("getId", $this->descendantCategoriesArray());
	}
}
