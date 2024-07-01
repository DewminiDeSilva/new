<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Beneficiary;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $beneficiaries = Beneficiary::where('nic', 'like', '%'.$search.'%')
            ->orWhere('first_name', 'like', '%'.$search.'%')
            ->orWhere('last_name', 'like', '%'.$search.'%')
            ->orWhere('province_name', 'like', '%'.$search.'%')
            ->orWhere('district_name', 'like', '%'.$search.'%')
            ->orWhere('ds_division_name', 'like', '%'.$search.'%')
            ->orWhere('gn_division_name', 'like', '%'.$search.'%')
            ->orWhere('as_center', 'like', '%'.$search.'%')
            ->orWhere('tank_name', 'like', '%'.$search.'%')
            ->paginate(10);
        
        return view('beneficiary.beneficiary_index', compact('beneficiaries', 'search'));
    }

    public function generateCsv()
    {
        $beneficiaries = Beneficiary::latest()->get();
        $filename = 'beneficiary_report.csv';
        $fp = fopen($filename, 'w+'); // Corrected file path
        fputcsv($fp, ['NIC','First Name', 'Last Name','gender','dob','address','phone','income','family_members_count','education','land_ownership','age','province_name','district_name','ds_division_name','gn_division_name','as_center','tank_name','acc_number','acc_name','latitude','longitude']);
    
        foreach ($beneficiaries as $row) {
            fputcsv($fp, [$row->nic,$row->first_name, $row->last_name,$row->gender,$row->dob,$row->address,$row->phone,$row->income,$row->family_members_count,$row->education,$row->land_ownership,$row->age,$row->province_name,$row->district_name,$row->ds_division_name,$row->gn_division_name,$row->as_center,$row->tank_name,$row->acc_number,$row->acc_name,$row->latitude,$row->longitude]);
        }
        fclose($fp);
        $headers = [
            'Content-Type' => 'text/csv',
        ];
    
        return response()->download($filename, 'beneficiary_report.csv', $headers);
    }

    public function index()
    {
        $beneficiaries = Beneficiary::latest()->paginate(10); // Paginate the results
       
        $maleCount = Beneficiary::where('gender', 'male')->count();
        $femaleCount = Beneficiary::where('gender', 'female')->count();
        return view('beneficiary.beneficiary_index', compact('beneficiaries', 'maleCount', 'femaleCount'));
        // return response()->json($beneficiaries);
        // return view('dashboard.dashboard', compact('maleCount', 'femaleCount'));
        
    }

    public function dashboard()
    {
        $maleCount = Beneficiary::where('gender', 'male')->count();
        $femaleCount = Beneficiary::where('gender','female')->count();
        $youthCount = Beneficiary::where('age','<', 30)->count();
        $middleAgeCount = Beneficiary::where('age','>=', 30)->count();
        return view('dashboard.dashboard', compact('maleCount', 'femaleCount', 'youthCount', 'middleAgeCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beneficiary.beneficiary_create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $beneficiary = new Beneficiary;

            $beneficiary->nic = request('nic');
            $beneficiary->first_name = request('first_name');
            $beneficiary->last_name = request('last_name');
            $beneficiary->gender = request('gender');
            $beneficiary->dob = request('dob');
            $beneficiary->address = request('address');
            $beneficiary->phone = request('phone');
            $beneficiary->income = request('income');
            $beneficiary->family_members_count = request('family_members_count');
            $beneficiary->education = request('education');
            $beneficiary->land_ownership = request('land_ownership');
            $beneficiary->age = request('age');
            // $beneficiary->province = request('province');
            // $beneficiary->district = request('district');
            // $beneficiary->ds_division = request('ds_division');

            // $beneficiary->province_name = request('province_name');
            // $beneficiary->district_name = request('district_name');
            // $beneficiary->ds_division_name = request('ds_division_name');
            $beneficiary->province_name = $request->input('province_name');
            $beneficiary->district_name = $request->input('district_name');
            $beneficiary->ds_division_name = $request->input('ds_division_name');
            $beneficiary->gn_division_name = $request->input('gn_division_name');
            $beneficiary->as_center = $request->input('as_center');
            $beneficiary->tank_name = $request->input('tank_name');
            $beneficiary->acc_number = request('acc_number');
            $beneficiary->acc_name = request('acc_name');
            $beneficiary->latitude = request('latitude');
            $beneficiary->longitude = request('longitude');
            $beneficiary->save();

        // return redirect('/beneficiary');

        // return Redirect::back()->with('success', 'Beneficiary registered successfully.');
         return redirect('/beneficiary')->with('success', 'Beneficiary registered successfully.');

        // After saving the beneficiary, get its ID
        $beneficiaryId = $beneficiary->id; // Assuming you've saved the $beneficiary instance

        // Redirect to the family creation form for the newly created beneficiary
        //return redirect()->route('family/create', ['beneficiaryId' => $beneficiaryId]);
        
        }

    /**
     * Display the specified resource.
     */
    public function show(Beneficiary $beneficiary)
    {
        

        return view('beneficiary.beneficiary_show', compact('beneficiary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiary $beneficiary)
    {
        //return view('beneficiary.beneficiary_edit', compact('beneficiary'));

       // $beneficiary = Beneficiary::findOrFail($id);
        return view('beneficiary.beneficiary_edit', compact('beneficiary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beneficiary $beneficiary)
    {
        //dd("updated");
       $beneficiary->nic = request('nic');
        $beneficiary->first_name = request('first_name');
        $beneficiary->last_name = request('last_name');
        $beneficiary->gender = request('gender');
        $beneficiary->dob = request('dob');
        $beneficiary->address = request('address');
        $beneficiary->phone = request('phone');
        $beneficiary->income = request('income');
        $beneficiary->family_members_count = request('family_members_count');
        $beneficiary->education = request('education');
        $beneficiary->land_ownership = request('land_ownership');
        $beneficiary->age = request('age');
        // $beneficiary->province_name = $request->input('province_name');
        // $beneficiary->district_name = $request->input('district_name');
        // $beneficiary->ds_division_name = $request->input('ds_division_name');
        
        $beneficiary->province_name = request('province_name');
            $beneficiary->district_name = request('district_name');
            $beneficiary->ds_division_name = request('ds_division_name');
            $beneficiary->gn_division_name = $request->input('gn_division_name');
            $beneficiary->as_center = $request->input('as_center');
            $beneficiary->tank_name = $request->input('tank_name');
            $beneficiary->acc_number = request('acc_number');
            $beneficiary->acc_name = request('acc_name');
            $beneficiary->latitude = request('latitude');
            $beneficiary->longitude = request('longitude');

         $beneficiary->save();

        return redirect('/beneficiary')->with('success', 'Beneficiary updated successfully');
     


        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiary $beneficiary)
    {
        // Retrieve all associated family members for the beneficiary
        $familyMembers = $beneficiary->family;
    
        // Delete each family member
        foreach ($familyMembers as $familyMember) {
            $familyMember->delete();
        }
    
        // Now, delete the beneficiary
        $beneficiary->delete();
    
        return redirect('/beneficiary')->with('success', 'Beneficiary and associated family members deleted successfully');
    }
}
