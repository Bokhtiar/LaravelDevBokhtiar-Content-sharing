<?php
/*
* Author: Bokhtiar Toshar
* Email: Bokhtiartoshar1@gmail.com
* Company Name: BrsSoftTech@gmail.com>
*/

namespace App\Traits;

trait CrudTrait
{
    public function scopeindex($q)
    {
        return $q->paginate(10);
    }

    public function scopeActive($q)
    {
        return $q->where('status',1);
    }

    public function scopeInActive($q)
    {
        return $q->where('status',0);
    }

    public function scopeSearchBy($q, $search_key)
    {
        return $q->where('name','like','%'.$search_key.'%');
    }

    public function scopeSingle($q, $id)
    {
        return $q->where('id', $id)->first();
    }

    public function scopeStatus($q, $model)
    {
        if($model->status ==0){
            $model->status = 1;
            $model->save();
        }else{
            $model->status = 0;
            $model->save();
        }
    }
}

