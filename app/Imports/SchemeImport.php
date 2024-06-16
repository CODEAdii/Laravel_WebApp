<?php

namespace App\Imports;

use App\Models\Scheme;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SchemeImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Scheme::create([
                'scheme_code'=> $row['scheme_code'],
                'scheme_name'=> $row['scheme_name'],
                'central_state_scheme'=> $row['central_state_scheme'],
                'fin_year'=> $row['fin_year'],
                'state_disbursement'=> $row['state_disbursement'],
                'central_disbursement'=> $row['central_disbursement'],
                'total_disbursement'=> $row['total_disbursement'],
            ]);
        }
    }
}
