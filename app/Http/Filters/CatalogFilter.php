<?php 

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\AbstractFilter;


class CatalogFilter extends AbstractFilter {
    protected function getCallbacks(): array
    {
        return [
            'category' => [$this, 'category'],
            'order' => [$this, 'order'],
        ];
    }

    public function category(Builder $builder, $value) {
        if ($value != -1) $builder->where('category_id', $value);
    }

    public function order(Builder $builder, $value) {
        $pair = explode('-', $value);
        
        if ($pair[0] == 'year') $pair[0] = 'production_year';
        $pair[1] = ($pair[1] == "down" ? "DESC" : "ASC");

        $builder->orderBy($pair[0], $pair[1]);
    }
}

?>