<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Answers extends Model
{
    use HasFactory;
    protected $fillable = [
        'questions',
        'answers',
        'user_name',
        'user_id',
        'interview_date',
        'interview_time',
        'excel_file',
    ];

    public static function getAllAnswers(){
        $records = DB::table('answers')->select('id','questions','answers','user_name','user_id','interview_date','interveiw_time');
        return $records;
    }
}
