<?php

namespace App\Http\Controllers;

use App\Imports\SchemeImport;
use App\Models\Scheme;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SchemeController extends Controller
{
    /**
     * Display the scheme index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Retrieve all schemes and the first uploaded time
        $schemes = Scheme::all();
        $firstUploadedTime = Scheme::min('created_at');

        // Pass data to the scheme view
        return view("scheme", compact('schemes', 'firstUploadedTime'));
    }

    /**
     * Import data from Excel file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importExcelData(Request $request)
    {
        // Validate the request
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);

        // Import data using SchemeImport class
        Excel::import(new SchemeImport, $request->file('import_file'));

        // Redirect back with success message
        return redirect()->back()->with('status', 'Imported Successfully');
    }

    /**
     * Clear all scheme data.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        // Truncate the Scheme table
        Scheme::truncate();

        // Redirect back with success message
        return redirect()->back()->with('status', 'Data Cleared Successfully');
    }
}
