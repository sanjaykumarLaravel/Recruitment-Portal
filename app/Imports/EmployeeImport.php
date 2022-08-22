<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class EmployeeImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        // dd($row);
        return new Employee([
            'name'              => $row[1],
            'experience'        => $row[2],
            'technology'        => $row[3],
            'current_ctc'       => $row[4],
            'expected_ctc'      => $row[5],
            'notice_period'     => $row[6],
            'shortlisted'       => $row[7],
            'interviewed'       => $row[8],            
            'offered'           => $row[9],            
            // 'joined'            => $row[10],            
            'joined'            =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10])->format('d-m-Y'),            
            'status'            => 1,
            'skills'            => $row[12]           
        ]);
    }
}
