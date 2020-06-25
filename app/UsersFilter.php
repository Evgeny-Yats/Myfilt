<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersFilter extends Model
{
    protected $builder;
    protected $request;

    public function __construct($builder, $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function apply()
    {

        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    public function name($value)
    {
        $this->builder->where('name', 'like', "%$value%");

//        if ($request->has('name')) {
//            $users->where('name', 'like', "%$request->name%");
//        }
    }

    public function is_active($value)
    {
        $this->builder->where('is_active', $value);
    }

    public function birthday($value)
    {
        if (! $value) return;
        $this->builder->whereHas('info', function ($query) use($value) {

            $query->where('birthday', '>', $value);

        });
    }

    public function price_from($value)
    {
        if (! $value) return;
        $this->builder->where('price', '>=', $value);


    }

    public function price_to($value)
    {
        if (! $value) return;
        $this->builder->where('price', '<=', $value);


    }

    public function range_price($value)
    {
        if (! $value) return;
        $this->builder->where('price', '>=', $value);


    }

    public function gender($value)
    {
        $this->builder->where('gender', $value);
    }

    public function filters()
    {
        return $this->request->all();
    }
}
