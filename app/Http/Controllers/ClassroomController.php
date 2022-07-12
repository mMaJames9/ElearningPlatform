<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('classroom_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classrooms = Classroom::all()->sortByDesc("created_at");
        $data = Classroom::all()->count();
        
        return view('admin.classrooms.index', compact('classrooms', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('classroom_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassroomRequest $request)
    {
        $classroom = Classroom::create($request->all());

        $status = 'A new classroom was added successfully.';

        return redirect()->route('classrooms.create')->with([
            'status' => $status,
        ]);
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
    public function edit(Classroom $classroom)
    {
        abort_if(Gate::denies('classroom_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassRoomRequest $request, Classroom $classroom)
    {
        $classroom->update($request->all());

        $status = 'The classroom was updated successfully.';

        return redirect()->route('classrooms.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('classroom_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classroom = Classroom::FindOrFail($id);
        $classroom->delete();

        $status = 'The classroom was deleted successfully.';

        return redirect()->route('classrooms.index')->with([
            'status' => $status,
        ]);
    }
}
