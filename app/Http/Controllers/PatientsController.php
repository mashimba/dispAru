<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;

use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'reg_no' => 'required',
                'course_name' => 'required',
                'nhif_card_no' => 'required',
                'file_no' => 'required'
            ]);

        $patient = new Patient;
        $patient->first_name = $request->input('first_name');
        $patient->middle_name = $request->input('middle_name');
        $patient->last_name = $request->input('last_name');
        $patient->registration_number = $request->input('reg_no');
        $patient->programme_name = $request->input('course_name');
        $patient->nhif_card_no = $request->input('nhif_card_no');
        $patient->file_number = $request->input('file_no');
        
        if ($patient->save()){
            return redirect('addstudent')->with('success', 'Patient has been added');
        }else{
            return redirect('addstudent')->with('error', 'Patient could not be added');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

        return view('editpatient')->with('patient', $patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);

        $newFirstName = $request->input('first_name');
        $newMiddleName = $request->input('middle_name');
        $newLastName = $request->input('last_name');
        $newRegNo = $request->input('reg_no');
        $newCourse = $request->input('course_name');
        $newNhifCardNo = $request->input('nhif_card_no');
        $newFileNo = $request->input('file_no');

        $patient->first_name = $newFirstName;
        $patient->middle_name = $newMiddleName;
        $patient->last_name = $newLastName;
        $patient->registration_number = $newRegNo;
        $patient->programme_name = $newCourse;
        $patient->nhif_card_no = $newNhifCardNo;
        $patient->file_number = $newFileNo;
        $patient->save();

        return redirect('home')->with('success', 'Patient '.$patient->first_name.' records has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);

        $patient->delete();


        return redirect('home')->with('warning', 'Patient '.$patient->first_name.' was deleted');
        
    }

    public function validateRegNo(Request $request)
    {
        if ($request->ajax()) {
            $result = Patient::where('registration_number', $request->validValue)->get();

            $name = '';
            
            if (count($result) > 0) {
                foreach ($result as $value) {
                    $name = $value->first_name.' '.$value->last_name;
                }    
            }
            
            return $name;
        }
    }

    public function validateNhifNo(Request $request)
    {
        if ($request->ajax()) {
            $result = Patient::where('nhif_card_no', $request->validValue)->get();

            $name = '';

            if (count($result) > 0) {
                foreach ($result as $value) {
                    $name = $value->first_name. ' '. $value->last_name;
                }
            }

            return $name;
        }
    }
    public function validateFileNo(Request $request)
    {
        if ($request->ajax()) {
            $result = Patient::where('file_number', $request->validValue)->get();

            $name = '';

            if (count($result) > 0) {
                foreach ($result as $value) {
                    $name = $value->first_name. ' '. $value->last_name;
                }
            }

            return $name;
        }
    }
}
