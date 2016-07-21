<?php namespace fooCart\Core;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];
}