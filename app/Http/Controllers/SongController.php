<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Song;
use DB; 
class SongController extends Controller
{
    
    public function index(){
        $songs = Song::all();
        if ($songs) {
              $res['status'] = true;
              $res['message'] = $songs;
 
              return response($res);
        }else{
          $res['status'] = false;
          $res['message'] = 'Cannot find user!';
 
          return response($res);

    }
}
    public function add_song(Request $request){
        $rules = [
            'name' => 'required',
            'artist'=>'required',
         ];
         $message = [
            'required' => 'attribute :attribute is required!'
       ];

       $this->validate($request, $rules, $message);
       try {
        $song_name = $request->input('name');
        $artist = $request->input('artist');
        $album = $request->input('album');

        $save = Song::create([
            'name'=> $song_name,
            'artist'=> $artist,
            'album'=> $album,
        ]);
        
        $res['status'] = true;
        $res['message'] = 'Successful Add New Song!';
        return response($res, 200);
    } catch (\Illuminate\Database\QueryException $ex) {
        $res['status'] = false;
        $res['message'] = $ex->getMessage();
        return response($res, 500);
    }

        
    }
    public function delete_song(Request $request){
        try {
            $song_id = $request->input('id');
        DB::table('songs')->where('id',$song_id)->delete();
        $res['status'] = true;
        $res['message'] = 'Successful Delete song!';
        return response($res, 200);

        } catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    
        
    }
    public function song(){
        
    }

}