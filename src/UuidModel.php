<?php

namespace IgnitionNbs\LaravelUuidModel;

use Ramsey\Uuid\Uuid;

trait UuidModel
{
	/**
	 * UuidModel constructor. This constructor merges with
	 * Laravel\Eloquent\Model::__construct.
	 *
	 * @param array $attributes
	 * @throws \Exception
	 */
	public function __construct(array $attributes = [])
	{
		$this->setIncrementing(FALSE);
		$this->setKeyType('string');

		$newFillable = $this->fillable;
		if(!in_array('id', $newFillable)) {
			$newFillable[] = 'id';
			$this->fillable($newFillable);
		}

		$newGuarded = $this->guarded;
		if(in_array('id', $newGuarded)) {
			unset($newGuarded[array_search('id', $newGuarded)]);
			$this->guarded($newGuarded);
		}

		$attributes['id'] = Uuid::uuid4()->toString();

		parent::__construct($attributes);
	}
}