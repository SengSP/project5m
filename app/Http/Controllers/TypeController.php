<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Type;

class TypeController extends Controller
{
    //
    public function index(){
        $pagename = "ຈັດການປະເພດອາຫານ";
        return view('admin/type')->with('pagename', $pagename);
    }

    // function get foot type to view
    public function fnloadType(){
        $result = "";
        $data = DB::table('types')->get();
        if(count($data) > 0){
            foreach ($data as $dt) {
                $result .= '
                <tr>
                    <td class="w3-center">'.$dt->tid.'</td>
                    <td class="w3-center">'.$dt->tname.'</td>
                    <td class="w3-center">
                        <div class="w3-dropdown-hover">
                            <button class="w3-button w3-round-xxlarge"><i class="fa fa-ellipsis-h"></i></button>
                            <div class="w3-dropdown-content w3-bar-block w3-border w3-animate-zoom">
                                <button class="w3-bar-item w3-button" id="btnEdit" value="'.$dt->tid.'"><i class="fa fa-pencil-square-o"></i> ແກ້ໄຂ</button>
                                <button class="w3-bar-item w3-button" id="btnDel" value="'.$dt->tid.'"><i class="fa fa-trash"></i> ລຶບ</button>
                            </div>
                        </div>
                    </td>
                </tr>
                ';
            }
        }else{
            $result .= '<tr><td class="w3-center" colspan="3">ບໍ່ມີຂໍ້ມູນປະເພດອາຫານ</td></tr>';
        }
        $data = array('typedata' => $result);
        echo json_encode($data);
    }

    // function insert food type from view
    public function fninsertType(Request $req){
        $data = array('tname'=>$req->tname);
        $type = DB::table('types')->insert($data);
        return response()->json($type);
    }

    // function get data to update form
    public function fngetType($tid){
        $sql = DB::table('types')->where('tid', $tid)->get();
        if(count($sql) > 0){
            foreach ($sql as $dt) {
                $id = $dt->tid;
                $name = $dt->tname;
            }
        }else{
            $name = 'ບໍ່ມີຂໍ້ມູນນີ້ໃນລະບົບ';
        }
        $data = array(
            'id' => $id,
            'name' => $name
        );
        echo json_encode($data);
    }

    // function update food type
    public function fnupdateType(Request $req, $tid){
        $data = array(
            'tname' => $req->tname
        );
        $type = DB::table('types')->where('tid', $tid)->update($data);
        return response()->json($type);
    }

    // function delete food type
    public function fndeleteType($tid){
        $type = DB::table('types')->where('tid', $tid)->delete();
        return response()->json($type);
    }
}
