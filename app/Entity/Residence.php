<?php
/**
 * rio-sgps
 * Residence.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2018
 *
 * @author Aryel Tupinamba <aryel.tupinamba@lqdi.net>
 *
 * Created at: 03/09/2018, 17:55
 */

namespace SGPS\Entity;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SGPS\Traits\HasShortCode;
use SGPS\Traits\IndexedByUUID;

/**
 * Class Residence
 * @package SGPS\Entity
 *
 * @property string $id
 * @property string $shortcode
 * @property string $sector_id
 * @property string $lat
 * @property string $lng
 * @property string $address
 * @property string $territory
 * @property string $reference
 * @property string $gis_global_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property Sector $sector
 * @property Family[]|Collection $families
 * @property Person[]|Collection $residents
 */
class Residence extends Entity {

	use IndexedByUUID;
	use SoftDeletes;
	use HasShortCode;

	protected $table = 'residences';

	protected $fillable = [
		'sector_code',
		'lat',
		'lng',
		'address',
		'territory',
		'reference',
		'gis_global_id',
	];

	protected $casts = [
		'lat' => 'float',
		'lng' => 'float',
	];

	public function sector() {
		return $this->hasOne(Sector::class, 'id', 'sector_id');
	}

	public function families() {
		return $this->hasMany(Family::class, 'residence_id', 'id');
	}

	public function residents() {
		return $this->hasMany(Person::class, 'residence_id', 'id');
	}

	public function getEntityID(): string {
		return $this->id;
	}

	public function getEntityType(): string {
		return 'residence';
	}

}