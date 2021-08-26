<?php

namespace App\Exports;

use App\Models\Bulk;
use App\Models\Answers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class BulkExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return [
            'id',
            'questions',
            'answers',
            'user_name',
            'user_id',
            'interview_date',
            'interview_time'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Bulk::all();
        return collect(Answers::getAllAnswers());
    }
}
