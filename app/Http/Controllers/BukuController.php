<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function getbuku()
    {
        $dt_buku=Buku::get();
        return response()->json($dt_buku);
    }

    public function getid($id) 
    {
        $dt_buku=buku::where('id','=',$id)->get();
        return response()->json($dt_buku);
    }
    public function createbuku(Request $req){
        $validate = Validator::make($req->all(),[
            'judul'=>'required',
            'jenis'=>'required',
            'pengarang'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = Buku::create([
            'judul'=>$req->judul,
            'jenis'=>$req->jenis,
            'pengarang'=>$req->pengarang,
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data buku.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal menambah data buku.']);
        }

    }    public function updatebuku(Request $req, $id){
        $validate = Validator::make($req->all(),[
            'judul'=>'required',
            'jenis'=>'required',
            'pengarang'=>'required'
            
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $update = Buku::where('id', $id)->update([
            'judul'=>$req->get('judul'),
            'jenis'=>$req->get('jenis'),
            'pengarang'=>$req->get('pengarang')
        ]);
        if($update){
            return response()->json(['status'=>true, 'message'=>'Sukses update data buku.']);

        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal update data buku.']);
        }

    }public function deletebuku($id){
        $delete = buku::where('id', $id)->delete();
        if($delete){
            return response()->json(['status'=>true, 'message' => 'Sukses delete data buku.']);
        }else{
            return response()->json(['status'=>false, 'message' => 'Gagal data buku.']);
        }
        
    }    
}           


