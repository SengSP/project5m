<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Response, Validator, File;

class FoodController extends Controller
{
    // function food page
    public function index(){
        $pagename = "ອາຫານ";
        $types = DB::table('types')->get();
        return view('admin/food')->with('pagename', $pagename)
                                 ->with('types', $types);
    }

    // function get food data to show in table
    public function fnloadFood(Request $req){
        $result = '';
        if($req->ajax()){
            $query = $req->get('query');
            if($query != ''){
                $foods = DB::table('foods')->where('tid', $query)->get();
                $count = count($foods);
                if($count > 0){
                    foreach ($foods as $row) {
                        $result .= '
                            <tr>
                                <td class="w3-center">'.$row->fid.'</td>
                                <td class="w3-center">'.$row->name.'</td>
                                <td class="w3-center">'.number_format($row->price).' ກີບ'.'</td>
                                <td class="w3-center"><img src="foodimg/'.$row->photoname.'" width="50px" height="50px" /></td>
                                <td class="w3-center">
                                    <div class="w3-dropdown-hover">
                                        <button class="w3-button w3-round-xxlarge"><i class="fa fa-ellipsis-h"></i></button>
                                        <div class="w3-dropdown-content w3-bar-block w3-border w3-animate-zoom">
                                            <input type="hidden" name="id" id="id" value="'.$row->fid.'">
                                            <button class="w3-bar-item w3-button" id="btnImage" value="'.$row->photoname.'"><i class="fa fa-image"></i> ແກ້ໄຂຮູບພາບ</button>
                                            <button class="w3-bar-item w3-button" id="btnEdit" value="'.$row->fid.'"><i class="fa fa-pencil-square-o"></i> ແກ້ໄຂຂໍ້ມູນ</button>
                                            <button class="w3-bar-item w3-button" id="btnDel" value="'.$row->fid.'"><i class="fa fa-trash"></i> ລຶບ</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }
                }else{
                    $result .= '<tr>
                        <td colspan="4" class="w3-center">ຍັງບໍ່ມີຂໍ້ມູນອາຫານເທື່ອ!</td>
                    </tr>';
                }
            }else{
                $sqltfood = DB::table('types')->orderBy('tid', 'asc')->take(1)->get();
                foreach ($sqltfood as $trow) {
                    $tid = $trow->tid;
                }
                $foods = DB::table('foods')->where('tid', $tid)->get();
                $count = count($foods);
                if($count > 0){
                    foreach ($foods as $row) {
                        $result .= '
                            <tr>
                                <td class="w3-center">'.$row->fid.'</td>
                                <td class="w3-center">'.$row->name.'</td>
                                <td class="w3-center">'.number_format($row->price).' ກີບ'.'</td>
                                <td class="w3-center"><img src="foodimg/'.$row->photoname.'" width="50px" height="50px" /></td>
                                <td class="w3-center">
                                    <div class="w3-dropdown-hover">
                                        <button class="w3-button w3-round-xxlarge"><i class="fa fa-ellipsis-h"></i></button>
                                        <div class="w3-dropdown-content w3-bar-block w3-border w3-animate-zoom">
                                            <input type="hidden" name="id" id="id" value="'.$row->fid.'">
                                            <button class="w3-bar-item w3-button" id="btnImage" value="'.$row->photoname.'"><i class="fa fa-image"></i> ແກ້ໄຂຮູບພາບ</button>
                                            <button class="w3-bar-item w3-button" id="btnEdit" value="'.$row->fid.'"><i class="fa fa-pencil-square-o"></i> ແກ້ໄຂຂໍ້ມູນ</button>
                                            <button class="w3-bar-item w3-button" id="btnDel" value="'.$row->fid.'"><i class="fa fa-trash"></i> ລຶບ</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }
                }else{
                    $result .= '<tr>
                        <td colspan="4" class="w3-center">ຍັງບໍ່ມີຂໍ້ມູນອາຫານເທື່ອ!</td>
                    </tr>';
                }
            }
            $data = array('showfood'=>$result);
            echo json_encode($data);
        }
    }

    // function show add food page
    public function fnAddfood(){
        $pagename = "ເພີ່ມລາຍການອາຫານ";
        $types = DB::table('types')->get();
        return view('admin/addfood')->with('pagename', $pagename)
                                    ->with('types', $types);
    }

    // function to insert new food
    public function fnInsertfood(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'price' => 'required',
            'fimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'tid' => 'required',
        ]);
        $imgname = time().'.'.$req->file('fimage')->getClientOriginalExtension();
        $name = $req->input('name');
        $price = $req->input('price');
        $tid = $req->input('tid');
        $indata = array(
            'name' => $name,
            'price' => $price,
            'photoname' => $imgname,
            'tid' => $tid
        );
        $req->file('fimage')->move(public_path('/foodimg'), $imgname);
        DB::table('foods')->insert($indata);
        return redirect('addfood')->with('success', 'Insert success');
    }

    // function update food image
    public function fneditFoodimg(Request $req)
    {
        $validate = Validator::make($req->all(), [
            'fid' => 'required',
            'fimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);
        if($validate->passes()){
            $fid = $req->input('fid');
            $oldimg = DB::table('foods')->where('fid', $fid)->get();
            if(count($oldimg) > 0){
                foreach($oldimg as $row){
                    $oldimgname = $row->photoname;
                }
                File::delete(public_path('/foodimg/'.$oldimgname));
                $imgname = time().'.'.$req->file('fimage')->getClientOriginalExtension();
                $updatedata = array('photoname' => $imgname);
                DB::table('foods')->where('fid', $fid)->update($updatedata);
                $req->file('fimage')->move(public_path('/foodimg'), $imgname);
            }else{
                $imgname = time().'.'.$req->file('fimage')->getClientOriginalExtension();
                $updatedata = array('photoname' => $imgname);
                DB::table('foods')->where('fid', $fid)->update($updatedata);
                $req->file('fimage')->move(public_path('/foodimg'), $imgname);
            }
            $data = "ການແກ້ໄຂຮູບພາບສຳເລັດ!";
            echo json_encode($data);
        }else{
            $error = $validate->errors()->all();
            echo json_encode($error);
        }
    }

    // function to load food data to edit form
    public function fnloadEditdata(Request $req)
    {
        $fid = $req->fid;
        $fooddata = DB::table('foods')->where('fid', $fid)->get();
        
        foreach ($fooddata as $row) {
            $fid = $row->fid;
            $name = $row->name;
            $price = $row->price;
            $tid = $row->tid;
        }
        $data = array('fid'=>$fid,'name'=>$name,'price'=>$price,'tid'=>$tid);
        echo json_encode($data);
    }

    // function update food data
    public function fneditFooddata(Request $req)
    {
        $fid = $req->fid;
        $name = $req->name;
        $price = $req->price;
        $tid = $req->tid;
        $dataupdate = array('name'=>$name,'price'=>$price,'tid'=>$tid);
        DB::table('foods')->where('fid', $fid)->update($dataupdate);
        $data = "ການແກ້ໄຂຂໍ້ມູນສຳເລັດ";
        echo json_encode($data);
    }

    // function delete food data
    public function fndeleteFood(Request $req)
    {
        $fid = $req->fid;
        $oldimg = DB::table('foods')->where('fid', $fid)->get();
        foreach ($oldimg as $row) {
            $oldimgname = $row->photoname;
        }
        File::delete('/foodimg/'.$oldimgname);
        DB::table('foods')->where('fid', $fid)->delete();
        $data = "ການລຶບຂໍ້ມູນອາຫານສຳເລັດ";
        echo json_encode($data);
    }
}
