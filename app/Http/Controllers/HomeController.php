<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('created_at', 'desc')->paginate(5);
        return view('home')->with('patients', $patients);
    }

    public function addstudent()
    {
        return view('addstudent');
    }

    public function editpatient()
    {
        return view('editpatient');
    }

    public function checkRegistered()
    {
        $pat = Patient::all();

        $num = count($pat);
        return view('layouts.master')->with('total', $num);
        //return view('testing')->with('pats', $pat);    
    }

    public function liveSearch(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $none = 'none';
            $patients = DB::table('patients')->orderBy('registration_number')->where('first_name', 'LIKE', '%'.$request->search.                                   '%')
                                             ->orWhere('last_name', 'LIKE', '%'.$request->search.'%')
                                             ->orWhere('registration_number', 'LIKE', '%'.$request->search.'%')
                                             ->orWhere('nhif_card_no', 'LIKE', '%'.$request->search.'%')
                                             ->orWhere('file_number', 'LIKE', '%'.$request->search.'%')->limit(5)->get();

            if ($patients) {
                foreach ($patients as $patient) {
                    $output .= '<tr>'.
                                    '<td class="text-center">'.$patient->registration_number.'</td>'.
                                    '<td class="text-center">'.$patient->first_name.'</td>'.
                                    '<td class="text-center">'.$patient->middle_name.'</td>'.
                                    '<td class="text-center">'.$patient->last_name.'</td>'.
                                    '<td class="text-center">'.$patient->programme_name.'</td>'.
                                    '<td class="text-center">'.$patient->nhif_card_no.'</td>'.
                                    '<td class="text-center">'.$patient->file_number.'</td>'.
                                    '<td class="text-center"><a href="/editpatient" class="btn btn-default"  data-toggle="tooltip" data-placement="left" title="Tooltip on left">Edit</a></td>'
                             .'</tr>';
                }
                return Response($output); 
            }else{
                return Response()->json(['no'=>'not found']);
            }       
        }
    }
}