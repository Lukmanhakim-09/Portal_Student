<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KRSEnrollment extends Model
{
    use HasFactory;

    protected $table = 'krs_enrollments';

    protected $fillable = [
        'user_id', 'kode_mk', 'nama_mk', 'sks', 'kelas', 'hari', 'mulai', 'selesai',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
} 