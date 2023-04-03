<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
Use App\Models\Jurusan;


class Jurusancontroller extends Controller
{
    public function getjurusan()
    {
        $dt_jurusan=jurusan::get();
        return response()->json($dt_jurusan);
    }

    public function getid($id) 
    {
        $dt_jurusan=jurusan::where('id','=',$id)->get();
        return response()->json($dt_jurusan);
    }

    public function createjurusan(Request $req){
        $validate = Validator::make($req->all(),[
            'nama_jurusan'=>'required',
            
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = Jurusan::create([
            'nama_jurusan'=>$req->nama_jurusan,
            
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data jurusan.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal menambah data jurusan.']);
        }
    }
        public function updatejurusan(Request $req, $id){
            $validate = Validator::make($req->all(),[
                'nama_jurusan'=>'required',
                
                
            ]);
            if($validate->fails()){
                return response()->json($validate->errors()->toJson());
            }
            $update = Jurusan::where('id', $id)->update([
                'nama_jurusan'=>$req->get('nama_jurusan'),
                
            ]);
            if($update){
                return response()->json(['status'=>true, 'message'=>'Sukses update data jurusan.']);
    
            }else{
                return response()->json(['status'=>false, 'message'=>'Gagal update data jurusan.']);
            
            }
        }public function deletejurusan($id){
            $delete = jurusan::where('id', $id)->delete();
            if($delete){
                return response()->json(['status'=>true, 'message' => 'Sukses delete data jurusan.']);
            }else{
                return response()->json(['status'=>false, 'message' => 'Gagal data jurusan.']);
            }
    
}

}