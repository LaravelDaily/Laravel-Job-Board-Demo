<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Job extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'jobs';

    protected $dates = [
        'hired_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'delivery_date',
    ];

    protected $fillable = [
        'title',
        'budget',
        'hired_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'employer_id',
        'description',
        'candidate_id',
        'delivery_date',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'job_id');
    }

    public function getattachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }

    public function getDeliveryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeliveryDateAttribute($value)
    {
        $this->attributes['delivery_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getHiredAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setHiredAtAttribute($value)
    {
        $this->attributes['hired_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
