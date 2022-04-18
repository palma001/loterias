<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Base extends Model
{
    use HasFactory;

	public static $filterable = [];

    public function scopeBetweenDate($q, array $data = array())
    {
        if (!empty($data['dateFilter'])) {
            $fields = json_decode($data['dateFilter'], true);
            $fields = array_filter($fields, 'strlen');
            $fields = Arr::except($fields, static::$filterable);
            if (isset($fields['to']) && isset($fields['from']) && isset($fields['field'])) {
                $contains = Str::of($fields['field'])->contains('.');
                $relations = Str::of($fields['field'])->explode('.');
                if ($contains) {
                    $q->whereDate(Str::camel($relations[0]), function ($q) use ($relations, $fields) {
                        $q->whereDate($relations[1], '>=', $fields["from"])
                            ->whereDate($relations[1], '<=', $fields["to"]);
                    });
                } else {
                    $q->whereDate($fields['field'], '>=', $fields["from"])
                        ->whereDate($fields['field'], '<=', $fields["to"]);
                }
            }
        }
    }

    public function scopeFilters($q, array $data = array())
	{
		if (!empty($data['dataFilter'])) {
            $fields = json_decode($data['dataFilter'], true);
            $fields = array_filter($fields, 'strlen');
            $fields = Arr::except($fields, static::$filterable);
			$q->where(function ($query) use ($fields) {
				foreach ($fields as $field => $value) {
					if (isset($fields[$field])) {
						$contains = Str::of($field)->contains('.');
						$relations = Str::of($field)->explode('.');
						if ($contains) {
							$query->whereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->where($relations[1], 'like', "%$fields[$field]%");
							});
						} else {
							$query->where($field, 'like', "%$fields[$field]%");
						}
                    }
                }
            });
		}
    }

	/**
	 * Search function of fields in the database.
	 *
	 * @param array fields for searches
	 *
	 * @return results data
	 */
	// llamada por wh? dejame quitarle el telefono a mi madre

	public static function scopeSearch($q, array $data = array())
	{
		if (!empty($data['dataSearch'])) {
			$fields = json_decode($data['dataSearch'], true);
            $fields = array_filter($fields, 'strlen');
            $fields = Arr::except($fields, static::$filterable);
            $q->where(function ($query) use ($fields) {
				foreach ($fields as $field => $value) {
					if (isset($fields[$field])) {
						$contains = Str::of($field)->contains('.');
						$relations = Str::of($field)->explode('.');
						if ($contains) {
							$query->orWhereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->where($relations[1], 'LIKE', "%$fields[$field]%");
							});
						} else {
							$query->orWhere($field, 'LIKE', "%$fields[$field]%");
						}
                    }
                }
            });
		}

        if(isset($data['sortBy']) && isset($data['sortOrder'])) {
            $q->orderBy($data['sortBy'], $data['sortOrder']);
        }

		if (isset($data['paginate']) && $data['paginate'] === "true" || isset($data['paginated']) && $data['paginated'] === "true") {
			return $q->paginate($data['perPage']);
		} else {
			return $q->get();
		}
	}
}
