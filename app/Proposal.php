<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Proposal extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'proposals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'approved_at',
        'rejected_at',
    ];

    protected $fillable = [
        'job_id',
        'budget',
        'created_at',
        'updated_at',
        'deleted_at',
        'approved_at',
        'rejected_at',
        'candidate_id',
        'proposal_text',
        'delivery_time',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    public function getattachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }

}
