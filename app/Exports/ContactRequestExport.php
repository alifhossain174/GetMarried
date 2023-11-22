<?php

namespace App\Exports;

use App\Models\ContactRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactRequestExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return ContactRequest::all();
        return ContactRequest::select("name", "email", "subject", "message")->get();
    }

    public function headings(): array
    {

        return ["Name", "Email", "Subject", "Message"];

    }
}
