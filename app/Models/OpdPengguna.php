<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class OpdPengguna extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_user',
        'id_opd',
        'nip',
        'nama_lengkap',
        'jabatan',
        'id_creator',
        'nama_creator',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) str()->uuid();
            }

            if (empty($model->id_creator) && empty($model->nama_creator)) {
                $model->id_creator = Auth::user()->id;
                $model->nama_creator = Auth::user()->name;
            }
        });
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'id_opd', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
