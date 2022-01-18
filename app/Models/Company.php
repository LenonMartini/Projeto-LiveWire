<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    public $timestamps = false;


    protected $fillable = [
                            'social_reason',
                            'abbreviated',
                            'cnpj',
                            'fone',
                            'ie',
                            'im',
                            'email',
                            'logo',
                            'status',
                            'cep',
                            'andress',
                            'number',
                            'district',
                            'city',
                            'state',
                            'uf',
                        ];
    /*public function user(){

        return $this->belongsTo(User::class);
    }*/
}
