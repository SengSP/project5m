<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator;

class TableController extends Controller
{
    //function show table page
    public function fnTablespage()
    {
        $pagename = "ໂຕະອາຫານ";
        return view('admin/table')->with('pagename', $pagename);
    }

    // function get table data to show on table
    public function fnloadTables(Request $req)
    {
        $result = "";
        $tables = DB::table('tables')->get();
        $count = count($tables);
        if($count > 0){
            foreach ($tables as $tb) {
                $result .= '
                <tr>
                    <td class="w3-center">'.$tb->tbid.'</td>
                    <td class="w3-center">'.$tb->tbname.'</td>
                    <td class="w3-center">
                        <button class="w3-button w3-orange" id="btnEdit" value="'.$tb->tbid.'"><i class="fa fa-pencil-square-o"></i> ແກ້ໄຂ</button>
                    </td>
                    <td class="w3-center">
                        <button class="w3-button w3-red" id="btnDel" value="'.$tb->tbid.'"><i class="fa fa-trash"></i> ລົບ</button>
                    </td>
                </tr>';
            }
        }else{
            $result .= '
            <tr>
                <td class="w3-center" colspan="4"><h4>ຍັງບໍ່ມີຂໍ້ມູນໂຕະໃນລະບົບ</h4></td>
            </tr>';
        }
        $data = array('result'=>$result,'count'=>$count);
        echo json_encode($data);
    }

    // function insert new table
    public function fninsertTale(Request $req)
    {
        $tbname = $req->tbname;
        $indata = array('tbname'=>$tbname);
        DB::table('tables')->insert($indata);
        $data = "ການເພີ່ມຂໍ້ມູນສຳເລັດ";
        echo json_encode($data);
    }

    // function get table data by id to edit form
    public function fngetTableEdit(Request $req)
    {
        $tbid = $req->tbid;
        $sqledit = DB::table('tables')->where('tbid', $tbid)->get();
        foreach ($sqledit as $row) {
            $id = $row->tbid;
            $tbname = $row->tbname;
        }
        $data = array('id'=>$id,'tbname'=>$tbname);
        echo json_encode($data);
    }

    // function update table data by id
    public function fnupdateTable(Request $req)
    {
        $tbid = $req->tbid;
        $tbname = $req->tbname;
        $updatedata = array('tbname'=>$tbname);
        DB::table('tables')->where('tbid', $tbid)->update($updatedata);
        $data = "ການແກ້ໄຂຂໍ້ມູນສຳເລັດ";
        echo json_encode($data);
    }

    // function delete table data by id
    public function fndeleteTable(Request $req)
    {
        $tbid = $req->tbid;
        DB::table('tables')->where('tbid', $tbid)->delete();
        $data = "ການລົບຂໍ້ມູນໂຕະສຳເລັດ";
        echo json_encode($data);
    }
}
