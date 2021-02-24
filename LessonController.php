<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class LessonController extends Controller
{
    public function studentLogin()
    {
        $coursesNotTaken = ["mathematic", "logic","electrical"];  //all the courses.
        $id = Auth::guard("webS")->user()->id;

        $coursesTakenBy = DB::table("TakenCourses")->get()->where("studentid",$id)->where("year", date("Y"));
        $coursesTaken = [];
        foreach($coursesTakenBy as $courseTaken){
            $course = $courseTaken->course;
            array_push($coursesTaken, $course);
            $index = array_search($course, $coursesNotTaken);
            unset($coursesNotTaken[$index]);
        }
       
        return view("StudentCourses",["coursesTaken" => $coursesTaken, "coursesNotTaken" => $coursesNotTaken]);
    }

    public function courseAdd(Request $req){

        $saved = DB::table("TakenCourses")->insert([
            'studentid' => Auth::guard("webS")->user()->id,
            'course' => $req->get("course"),
            'year' => date('Y'),
        ]);
        if($saved){
            return response()->json([$req->course]);
        }
    }

    public function openUpload(Request $req){
        
        $currentYear = (int) date("Y");
        $nextYear = $currentYear+1;
        $req->validate([
            'day' => 'required|integer|between:1,31',
            'month' => 'required|integer|between:1,12',
            'year' => "required|integer|between:$currentYear,$nextYear",
            'hour' => 'required|integer|between:0,23',
            'minute' => 'required|integer|between:0,59',
            'size' => 'required|integer|between:1,100',
        ]);

        if(!checkdate($req->month, $req->day, $req->year)){
            $custError = "The date you just inserted is not in correct format.";
            return redirect()->route("toGivenCourse",["custError" => $custError, "course" => "$req->course"]);
        }
        
        DB::table("GivenCourses")->where("course", $req->course)->where("year", date("Y"))->update(["$req->path" => strtotime("$req->day-$req->month-$req->year $req->hour:$req->minute")]);
        DB::table("AcceptedFiles")->where("course", $req->course)->update(["$req->path" => $req->acptFiles]);
        DB::table("HomeworkSize")->where("course", $req->course)->update(["$req->path" => $req->size]);
        return redirect()->back();
    }

    public function uploadHomework(Request $req){
        $pt = $req->path;
        $tuple =  DB::table("AcceptedFiles")->get()->where("course", "$req->course")->first();
        $extensions = get_object_vars($tuple)[$pt];
        $tuple = DB::table("HomeworkSize")->get()->where("course", "$req->course")->first();
        $size = get_object_vars($tuple)[$pt];
        return view("UploadHomework",["course" => $req->course, "path" => $pt, "acptFiles" => $extensions, "size" => $size]);
    }

    public function toCourseTaken(Request $req){
        $teacherFiles = array();
        $uploadOrNot = array();
        $uploadedHomeworks = array();
        $studNo = Auth::guard("webS")->user()->id;
        $path = public_path("storage")."/$req->course";
        $tuple = DB::table("GivenCourses")->get()->where("course",$req->course)->where("year",date("Y"))->first();

        for($i=1; $i<=15; $i++){
            $files = [];
            $homeworks = [];
            array_push($uploadOrNot, get_object_vars($tuple)["path".$i]);

            if(is_dir($path."/path".$i."/teacherfiles")){          //this is for uploaded teacher files.
                $dh = opendir($path."/path".$i."/teacherfiles");
                while($file=readdir($dh)){
                    if($file != "" && $file != "." && $file != ".."){
                        array_push($files, $file);
                    }
                }
            }             
            array_push($teacherFiles, $files);
 
            if(is_dir($path."/path".$i."/$studNo")){                 //this is for uploaded homewroks.
                $dh = opendir($path."/path".$i."/$studNo");
                while($homework=readdir($dh)){
                    if($homework != "" && $homework != "." && $homework != ".."){
                        array_push($homeworks, $homework);
                    }
                }
            }
            array_push($uploadedHomeworks, $homeworks);
        }
        return view("TakenCourse",["course" => "$req->course","teacherFiles" => $teacherFiles,"uploadOrNot" => $uploadOrNot, "uploadedHomeworks" => $uploadedHomeworks ]);
    }


    public function teacherLogin()
    {
        $tuples = DB::table("GivenCourses")->get()->where("teacherid",Auth::user()->id);
        $courseNames = [];
        foreach($tuples as $tuple){
            array_push($courseNames, get_object_vars($tuple)["course"]);
        }

        return view("GivenCourses",["courseNames" =>$courseNames]);
    }

    public function checkLogin(Request $req){
        $credentials = $req->only('email','password','type');
        
        if($credentials["type"] == "teacher"){
            if(Auth::attempt($credentials))
                return redirect("teacherLogin");
            else
                return view("TeacherLogin",["email" => $credentials["email"], "wrong" => "email or password is wrong"]);
        }else{
            if(Auth::guard("webS")->attempt($credentials))  //used different guard to use different default table for student login.
                return redirect("studentLogin");
            else
                return view("StudentLogin",["email" => $credentials["email"], "wrong" => "email or password is wrong"]);
        }        
    }


    public function toGivenCourse(Request $req){

        $count = count(Schema::getColumnListing("GivenCourses"))-5;
        $uploads = [];
        $teacherFiles = [];
        $tuple = DB::table("GivenCourses")->get()->where("teacherid", Auth::user()->id)->first();
        for($i=1; $i<=$count; $i++){
            $teacherFiles[$i-1] = null;
            $files = [];
            array_push($uploads, get_object_vars($tuple)["path".$i]);
            $dir = public_path("storage")."/$req->course/path$i/teacherfiles";
            
            
            if(is_dir($dir)){
                $dh = opendir($dir);
                while(($file=readdir($dh)) !== false){
                    if($file != "" && $file != "." && $file != "..")
                        array_push($files, $file);
                }
            }    
            $teacherFiles[$i-1] = $files;
        }

        $custError = $req->custError;
        return view("GivenCourse",["teacherFiles" => $teacherFiles, "uploads" => $uploads, "count" => $count, "course" => $req->course, "custError" => $custError]);
    }


    public function uploadedHomeworks(Request $req){
        $datas = array();
        $tuples = DB::table("TakenCourses")->get()->where("course", $req->course);

        foreach($tuples as $tuple){
            $data = [];
            $no = $tuple->studentid;
            $name = DB::table("Students")->where("id", $no)->first()->name; 

            array_push($data, $no);
            array_push($data, $name);
            $dir = public_path("storage")."/$req->course/$req->path/$no";
            try{
                $dh = opendir($dir);
            }catch(Exception $e){
                array_push($datas, $data);
                continue;
            }
            if($dh){
                while(($file=readdir($dh)) !== false){

                    if($file != "" && $file != "." && $file != ".."){
                        array_push($data, substr($file, 0, strlen($file)-11));
                        $deliveryDate = intval(substr($file, -10));
                        array_push($data, $deliveryDate);
                        $deadLine = DB::table("GivenCourses")->select("$req->path")->where("course", $req->course)->where("year", date("Y"))->first();
                        $pt = $req->path;
                        $deadLine = $deadLine->$pt;

                        $timeDiffString = "";
                        $timeDiff = max($deadLine, $deliveryDate) - min($deadLine, $deliveryDate);
                        $timeDiffString .= intval($timeDiff/86400) . "days, ";
                        $timeDiff = $timeDiff % 86400;
                        $timeDiffString .= intval($timeDiff/3600) . "hours, ";
                        $timeDiff = $timeDiff % 3600;
                        $timeDiffString .= intval($timeDiff/60) . "minutes, ";
                        $timeDiff = $timeDiff % 60;
                        $timeDiffString .= $timeDiff . "seconds ";

                        if($deliveryDate<$deadLine){
                            $timeDiffString = "Uploaded " . $timeDiffString . "before the deadline.";
                        }
                        else{
                            $timeDiffString = "Uploaded " . $timeDiffString . "after the deadline.";
                        }
                        
                        array_push($data, $timeDiffString);

                    }
                }
                array_push($datas, $data);
            }
        }
       return view("UploadedHomeworks", ["datas" => $datas, "course" => $req->course, "path" => $req->path]);
    }

    public function uploadFile(Request $req){
        
        return view("UploadFile",["course" => $req->course, "path" => $req->path]);
    }

    public function fileStore(Request $req)
    {
        $file = $req->file("file");
        $destinationPath = public_path("storage")."/$req->course/$req->path/teacherfiles/";
        $file->move($destinationPath,$file->getClientOriginalName());

        return response()->json($file->getClientOriginalName());
    }

    public function fileDestroy(Request $req)
    {

        $fileName = $req->get('filename');
        $dir = "public/$req->course/$req->path/teacherfiles/";
        if($fileName){
            Storage::delete($dir.$fileName);
        }
        
        return response()->json($fileName);
    }


    public function fileExisting(Request $req){

        $fileList = array();
        $dir = public_path("storage")."/$req->course/$req->path/teacherfiles/";
        $asset_path = "storage/$req->course/$req->path/teacherfiles/";


        if($dh = opendir($dir)){
            while (($file=readdir($dh)) !== false){
                if($file != "" && $file != "." && $file != ".."){

                    $file_path = $dir.$file;
                    $size = filesize($file_path);
                    $fileList[] = array("name"=>$file, "size"=>$size, "path"=>$asset_path.$file);
                }
            }
            closedir($dh);
        }

        return response()->json($fileList);
    }

    public function homeworkStore(Request $req)
    {
        $id = Auth::guard("webS")->user()->id;
        $file = $req->file("file");
        $destinationPath = public_path("storage")."/$req->course/$req->path/$id/";
        $file->move($destinationPath,$file->getClientOriginalName()."_".time());

        return response()->json($file->getClientOriginalName());
    }

    public function homeworkDestroy(Request $req)
    {
        $id = Auth::guard("webS")->user()->id;
        $fileName = $req->get('filename');
        $dir = "public/$req->course/$req->path/$id/";

        if($fileName){
            Storage::delete($dir.$fileName);
        }
        return response()->json($fileName);
    }



    public function homeworkExisting(Request $req){

        $id = Auth::guard("webS")->user()->id;
        $fileList = array();
        $dir = public_path("storage")."/$req->course/$req->path/$id/";
        $asset_path = "storage/$req->course/$req->path/$id/";

        if($dh = opendir($dir)){
            while (($file=readdir($dh)) !== false){
                if($file != "" && $file != "." && $file != ".."){

                    $file_path = $dir.$file;
                    $size = filesize($file_path);
                    $fileList[] = array("name"=>$file, "size"=>$size, "path"=>$asset_path.$file);
                }
            }
            closedir($dh);
        }
        return response()->json($fileList);
    }
}