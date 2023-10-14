<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $equipment = Equipment::where('name', 'like', "%{$search}%")->get();
        } else {
            $equipment = Equipment::all();
        }

        return view('tools.home_equipment', compact('equipment'));
    }


    public function create()
    {
        return view('tools.create_equipment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'u_name' => 'required',
            'u_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $statust = 'ว่าง';
        $user = 'ว่าง';
        $obj = new \App\Models\Equipment();

        if ($request->hasFile('u_image')) {
            $image = $request->file('u_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $fileName);
            $obj->image = $fileName;
        } else {
            $obj->image = '';
        }

        $obj->name = $request->input('u_name') ?: ' ';
        $obj->status = $statust;
        $obj->user = $user;
        $obj->save();

        return redirect('/equipment')->with('success', 'New Equipment was created!!');
    }

    public function book($id)
    {
        $equipment = Equipment::find($id); // ตรวจสอบเครื่องมือที่ต้องการจอง

        if (!$equipment) {
            return redirect('/equipment')->with('error', 'Equipment not found!!');
        }

        $equipment->status = 'จอง'; // กำหนดสถานะเป็น "จอง"
        $equipment->user = Auth::user()->name; // กำหนดผู้ใช้ที่จอง

        $equipment->save(); // บันทึกการเปลี่ยนแปลง

        return redirect('/equipment')->with('success', 'Equipment has been booked!!');
    }


    public function edit($id)
{
    $tmp = \App\Models\Equipment::find($id);
    return view('tools.edit_equipment', compact('tmp'));
}

public function update(Request $request, $id)
{
    $tmp = \App\Models\Equipment::find($id);
    if ($request->hasFile('u_image')) {
        // มีการอัปโหลดรูปใหม่
        $request->validate([
            'u_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'u_name' => 'required',
            'u_status' => 'required',
        ]);
        $image = $request->file('u_image');
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $fileName);
    } else {
        // ไม่มีการอัปโหลดรูปใหม่ ใช้รูปเดิม
        $fileName = $tmp->image; // ให้ $fileName มีค่าเป็นชื่อไฟล์เดิม
    }

    $tmp->image = $fileName;
    $tmp->name = $request->get('u_name');
    $tmp->status = $request->get('u_status');
    $tmp->user = $tmp->user; 
    $tmp->save();

    return redirect('/equipment')->with('success', 'Tool has been updated!!');
}





    public function destroy($id)
    {
        $tmp = Equipment::find($id);
        $tmp->delete();

        return redirect('/equipment')->with('success', 'Tool has been deleted!!');
    }
}
