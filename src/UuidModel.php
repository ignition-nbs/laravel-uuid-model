<?php

namespace IgnitionNbs\LaravelUuidModel;

use Ramsey\Uuid\Uuid;

trait UuidModel
{
	/**
	 * Initialize this Trait.
	 * Set $incrementing to FALSE, $keyType to "string", and make `id`
	 * mass-assignable. Lastly, create a version 4 UUID, and assign that to the
	 * `id` attribute.
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function initializeUuidModel()
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

		$this->attributes['id'] = Uuid::uuid4()->toString();
	}
}