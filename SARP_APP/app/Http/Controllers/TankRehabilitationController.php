<?php

namespace App\Http\Controllers;

use App\Models\TankRehabilitation;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;


class TankRehabilitationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function reportCsv()
    {
        $tankRehabilitations = TankRehabilitation::latest()->get();
        $filename = 'tank_rehabilitation_report.csv';
        $fp = fopen($filename, 'w+'); // Corrected file path
        fputcsv($fp, ['Tank Id','Tank Name', 'River Basin', 'Cascade Name', 'Province', 'District', 'DS Division', 'GN Division', 'AS Centre', 'Agency', 'No of Family', 'Longitude', 'Latitude', 'Progress', 'Contractor', 'Payment', 'EOT', 'Contract Period', 'Status', 'Remarks']);
    
        foreach ($tankRehabilitations as $row) {
            fputcsv($fp, [$row->tank_id,$row->tank_name, $row->river_basin, $row->cascade_name, $row->province, $row->district, $row->ds_division, $row->gn_division, $row->as_centre, $row->agency, $row->no_of_family, $row->longitude, $row->latitude, $row->progress, $row->contractor, $row->payment, $row->eot, $row->contract_period, $row->status, $row->remarks]);
        }
        fclose($fp);
        $headers = [
            'Content-Type' => 'text/csv',
        ];
    
        return response()->download($filename, 'tank_rehabilitation_report.csv', $headers);
    }

    public function search(Request $request){

        $search = $request->get('search');
        $tankRehabilitations = TankRehabilitation::where('tank_id', 'like', '%'.$search.'%')
            ->orWhere('tank_name', 'like', '%'.$search.'%')
            ->orWhere('river_basin', 'like', '%'.$search.'%')
            ->orWhere('cascade_name', 'like', '%'.$search.'%')
            ->orWhere('province', 'like', '%'.$search.'%')
            ->orWhere('district', 'like', '%'.$search.'%')
            ->orWhere('ds_division', 'like', '%'.$search.'%')
            ->orWhere('gn_division', 'like', '%'.$search.'%')
            ->orWhere('as_centre', 'like', '%'.$search.'%')
            ->orWhere('agency', 'like', '%'.$search.'%')
            ->orWhere('payment', 'like', '%'.$search.'%')
            ->orWhere('status', 'like', '%'.$search.'%')
            ->paginate(10);

        return view('tank.tank_rehabilitation_index', compact('tankRehabilitations', 'search'));
    }

    public function index()
{
    // Fetch TankRehabilitation records, ordered by latest, and paginate with 10 records per page
    $tankRehabilitations = TankRehabilitation::latest()->paginate(10);

    // Return the view with compacted tankRehabilitations data
    return view('tank\tank_rehabilitation_index', compact('tankRehabilitations'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tank.tank_rehabilitation_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tankRehabilitation = new TankRehabilitation;
        $tankRehabilitation->tank_id = request('tank_id');
        $tankRehabilitation->tank_name = request('tank_name');
        $tankRehabilitation->river_basin = request('river_basin');
        $tankRehabilitation->cascade_name = request('cascade_name');
        $tankRehabilitation->province = request('province');
        $tankRehabilitation->district = request('district');
        $tankRehabilitation->ds_division = request('ds_division');
        $tankRehabilitation->gn_division = request('gn_division');
        $tankRehabilitation->as_centre = request('as_centre');
        $tankRehabilitation->agency = request('agency');
        $tankRehabilitation->no_of_family = request('no_of_family');
        $tankRehabilitation->longitude = request('longitude');
        $tankRehabilitation->latitude = request('latitude');
        $tankRehabilitation->progress = request('progress');
        $tankRehabilitation->contractor = request('contractor');
        $tankRehabilitation->payment = request('payment');
        $tankRehabilitation->eot = request('eot');
        $tankRehabilitation->contract_period = request('contract_period');
        $tankRehabilitation->status = request('status');
        $tankRehabilitation->remarks = request('remarks');
        $tankRehabilitation->save();
        return redirect('/tank_rehabilitation');
    }

    /**
     * Display the specified resource.
     */
    public function show(TankRehabilitation $tankRehabilitation)
    {
        return view('tank.tank_rehabilitation_show', compact('tankRehabilitation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TankRehabilitation $tankRehabilitation)
    {
        return view('tank.tank_rehabilitation_edit', compact('tankRehabilitation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TankRehabilitation $tankRehabilitation)
    {
        $tankRehabilitation->tank_id = request('tank_id');
        $tankRehabilitation->tank_name = request('tank_name');
        $tankRehabilitation->river_basin = request('river_basin');
        $tankRehabilitation->cascade_name = request('cascade_name');
        $tankRehabilitation->province = request('province');
        $tankRehabilitation->district = request('district');
        $tankRehabilitation->ds_division = request('ds_division');
        $tankRehabilitation->gn_division = request('gn_division');
        $tankRehabilitation->as_centre = request('as_centre');
        $tankRehabilitation->agency = request('agency');
        $tankRehabilitation->no_of_family = request('no_of_family');
        $tankRehabilitation->longitude = request('longitude');
        $tankRehabilitation->latitude = request('latitude');
        $tankRehabilitation->progress = request('progress');
        $tankRehabilitation->contractor = request('contractor');
        $tankRehabilitation->payment = request('payment');
        $tankRehabilitation->eot = request('eot');
        $tankRehabilitation->contract_period = request('contract_period');
        $tankRehabilitation->status = request('status');
        $tankRehabilitation->remarks = request('remarks');
        $tankRehabilitation->save();

        return redirect('/tank_rehabilitation');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TankRehabilitation $tankRehabilitation)
    {
        $tankRehabilitation->delete();
        return redirect('/tank_rehabilitation');
    }

    public function uploadCsv(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        // Read the CSV file
        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        // Parse the CSV file
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        // Iterate through each row in the CSV
        foreach ($csv as $row) {
            // Create a new TankRehabilitation instance
            $tankRehabilitation = new TankRehabilitation();
            $tankRehabilitation->tank_id = $row['Tank Id'];
            $tankRehabilitation->tank_name = $row['Tank Name'];
            $tankRehabilitation->river_basin = $row['River Basin'];
            $tankRehabilitation->cascade_name = $row['Cascade Name'];
            $tankRehabilitation->province = $row['Province'];
            $tankRehabilitation->district = $row['District'];
            $tankRehabilitation->ds_division = $row['DS Division'];
            $tankRehabilitation->gn_division = $row['GN Division'];
            $tankRehabilitation->as_centre = $row['AS Centre'];
            $tankRehabilitation->agency = $row['Agency'];
            $tankRehabilitation->no_of_family = $row['No of Family'];
            $tankRehabilitation->longitude = $row['Longitude'];
            $tankRehabilitation->latitude = $row['Latitude'];
            $tankRehabilitation->progress = $row['Progress'];
            $tankRehabilitation->contractor = $row['Contractor'];
            $tankRehabilitation->payment = $row['Payment'];
            $tankRehabilitation->eot = $row['EOT'];
            $tankRehabilitation->contract_period = $row['Contract Period'];
            $tankRehabilitation->status = $row['Status'];
            $tankRehabilitation->remarks = $row['Remarks'];
            $tankRehabilitation->save();
        }

        // Provide feedback to the user
        return redirect('/tank_rehabilitation')->with('success', 'CSV data imported successfully');
    }
}