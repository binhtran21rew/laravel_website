<?php  

namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StorageImg{
    public function storeUpload($request, $fileName, $folder){
        if($request->hasFile($fileName)){
            $file = $request->$fileName;
            $postFile = $file->getClientOriginalName();
            $fileDB = Str::random(20). '.'. $file->getClientOriginalExtension();
            $path = $request->$fileName->storeAs('public/' . $folder. '/'. auth()->id(),$fileDB);
    
            $data =[
                'file_name' => $postFile,
                'file_path' => Storage::url( $path)
            ];
            return $data;
        }
       return null;

    }

    public function storeUploadMultiple($file, $folder){
        $postFile = $file->getClientOriginalName();
        $fileDB = Str::random(20). '.'. $file->getClientOriginalExtension();
        $path = $file->storeAs('public/' . $folder. '/'. auth()->id(),$fileDB);

        $data =[
            'file_name' => $postFile,
            'file_path' => Storage::url( $path)
        ];
        return $data;

    }
}