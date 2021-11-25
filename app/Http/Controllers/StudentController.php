<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('students')->distinct()->get();

        return view('index',['users'=>$users]);
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
        $name = $request->name;
        $surname = $request->surname;
        $address = $request->address;

        $add = DB::insert('insert into students(name,surname,address) values(?,?,?)',[$name,$surname,$address]);

         if ($add){
             return back()->with('success',"malumot bazaga qo`shildi");
         }else{
             return  back()->with('error','xatolik yuz berdi');
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

        $student = DB::select('select *from students where id=?',[$id]);

        $data= [];

       foreach ($student as $item){
           $data['id'] = $item->id;
           $data['name'] = $item->name;
           $data['surname'] = $item->surname;
           $data['address'] = $item->address;
       }



        return view('form.edit_student',['students'=>$data]);

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
        $name  = $request->name;
        $surname  = $request->surname;
        $address  = $request->address;


       $update = DB::update("update students set name = ?,surname=?,address=? where id = ?",[$name,$surname,$address,$id]);


       return view('index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->id;
//        ddd($id);
        $del = DB::delete('delete from students  where id = ?',[$id]);

      if ($del){
          return redirect()->back()->with('success','malumot o`chirildi');
      }else{
          return redirect()->back()->with('error','xatolik yux berdi');

      }
    }
}
