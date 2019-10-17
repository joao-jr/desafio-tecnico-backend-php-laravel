<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'description',
    	'address',
    	'street_number',
    	'neighborhood',
    	'city',
    	'state',
    	'uf',
    	'zip_code',
    	'contact_name',
    	'contact_emal',
    	'contact_phone',
    	'status',
    ];

    protected $dates = [
    	'created_at',
    	'updated_at'
    ];

    protected $hidden = [
    	'password',
    ];




    /**
     * Get the user that owns the quotation.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
