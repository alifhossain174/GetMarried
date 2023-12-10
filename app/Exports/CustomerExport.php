<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return ContactRequest::all();
        return User::select("name", "email", "contact", "provider_name", "address", "connections", "last_purchase_date", "created_at")->get();
    }

    public function headings(): array
    {

        return ["Name", "Email", "Contact", "Provider", "Address","Connections","Last Purchase Date","Created At"];

    }
}
