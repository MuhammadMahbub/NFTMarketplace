<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Like;
use App\Models\User;
use App\Models\ItemReport;
use App\Models\ReportUser;
use App\Models\ItemProblem;
use App\Models\NFTCategory;
use App\Models\Notification;
use App\Models\PlaceBid;
use Illuminate\Http\Request;
use App\Models\ReportCategory;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class ItemReportController extends Controller
{
    public function index()
    {
        return view('admin.ItemReport.index');
    }

    public function seeReport(){
        return view('admin.ItemReport.problem', ['problems' => ItemProblem::all()]);
    }

    public function ItemProblem(){
        return view('admin.ItemReport.problem', ['problems' => ItemProblem::all()]);
    }

    public function report_on_category(){
        return view('admin.ItemReport.report_category', ['report_cat' => ReportCategory::latest()->get()]);
    }

    public function userReportIndex(){
        return view('admin.ItemReport.userReport', ['report_user' => ReportUser::all()]);
    }

    public function ItemProblemsDestroy($id){
        $deleteProblem = ItemProblem::find($id);
        $deleteProblem->delete();
        return back()->withErrors("Problem Deleted Success !");
    }

    public function store(Request $request)
    {
        $request->validate(['problem' => 'required']);
        ItemReport::create($request->except('_token') + ['created_at' => Carbon::now()]);
        return back()->withSuccess('Problem Create Successful');
    }

    public function update(Request $request,$id)
    {
        $request->validate(['problem' => 'required']);
        $itemReport = ItemReport::find($id);
        $itemReport->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess('Problem Update Successful');
    }
    public function destroy($id)
    {
        $itemReport = ItemReport::find($id);

        $probs = ItemProblem::where('problem',$id)->get();
        foreach($probs as $prob){
            $prob->update([
                'problem' => NULL,
            ]);
        }

        $users = ReportUser::where('report_id',$id)->get();
        foreach($users as $user){
            $user->update([
                'report_id' => NULL,
            ]);
        }
        $cats = ReportCategory::where('report_id',$id)->get();
        foreach($cats as $cat){
            $cat->update([
                'report_id' => NULL,
            ]);
        }

        $itemReport->delete();
        return back()->withDanger('Problem Delete Success !');
    }

    public function problemStore(Request $request)
    {
        if($request->report_id){
            $prob = ItemProblem::create([
                'user_id'    => $request->user_id,
                'item_id'    => $request->item_id,
                'problem'    => $request->report_id,
                'created_at' => Carbon::now()
            ]);

            $admins = User::where('role_id', 1)->get();
            foreach($admins as $admin){
                Notification::create([
                    'user_id' => Auth::id(),
                    'type' => 'ItemProblem',
                    'type_id' => $prob->id,
                    'notify_to' => $admin->id,
                    'message' => Auth::user()->name.' Reports '.Item::find($request->item_id)->name.' Item',
                    'created_at' => Carbon::now(),
                ]);
            }

            $exist = Notification::where('user_id', Auth::id())->where('type', 'ItemProblem')->where('notify_to', Item::find($request->item_id)->creator_id)->first();
            if(!$exist){
                Notification::create([
                    'user_id' => Auth::id(),
                    'type' => 'ItemProblem',
                    'type_id' => $prob->id,
                    'notify_to' => Item::find($request->item_id)->creator_id,
                    'message' => Auth::user()->name.' Reports '.Item::find($request->item_id)->name.' Item',
                    'created_at' => Carbon::now(),
                ]);
            }

            return response()->json([
                'status' => 200,
                'message' => "Report Place Success !",
            ]);
        }else{
            return response()->json(['message' => "Please Select a Report !"]);
        }
    }

    public function report_to_user(Request $request)
    {
        $report_user = ReportUser::where('report_by',Auth::id())->where('report_to',$request->report_to)->where('report_id',$request->report_id)->first();
        if(!$report_user){
            if($request->report_id){
                $user_report = ReportUser::create([
                    'report_to'    => $request->report_to,
                    'report_by'    => Auth::id(),
                    'report_id'    => $request->report_id,
                    'created_at' => Carbon::now()
                ]);

                $admins = User::where('role_id', 1)->get();
                foreach($admins as $admin){
                    Notification::create([
                        'user_id' => Auth::id(),
                        'type' => 'ReportUser',
                        'type_id' => $user_report->id,
                        'notify_to' => $admin->id,
                        'message' => Auth::user()->name.' Reports '.User::find($request->report_to)->name,
                        'created_at' => Carbon::now(),
                    ]);
                }

                $exist = Notification::where('user_id', Auth::id())->where('type', 'ReportUser')->where('notify_to', $request->report_to)->first();
                if(!$exist){
                    Notification::create([
                        'user_id' => Auth::id(),
                        'type' => 'ReportUser',
                        'type_id' => $user_report->id,
                        'notify_to' => $request->report_to,
                        'message' => Auth::user()->name.' Reports '.User::find($request->report_to)->name,
                        'created_at' => Carbon::now(),
                    ]);
                }

                return response()->json([
                    'status' => 200,
                    'message' => "Report Place Success !",
                ]);
            }else{
                return response()->json(['message' => "Please Select a Report !"]);
            }
        }else{
            return response()->json(['message' => "You Already Reported !"]);
        }
    }

    public function report_to_category(Request $request)
    {
        $report_cat = ReportCategory::where('report_by',Auth::id())->where('category_id',$request->category_id)->where('report_id',$request->report_id)->first();
        if(!$report_cat){
            if($request->report_id){
                $user_cat = ReportCategory::create([
                    'report_by'    => $request->report_by,
                    'category_id'  => $request->category_id,
                    'report_id'    => $request->report_id,
                    'created_at' => Carbon::now()
                ]);

                $admins = User::where('role_id', 1)->get();
                foreach($admins as $admin){
                    Notification::create([
                        'user_id' => Auth::id(),
                        'type' => 'ReportCategory',
                        'type_id' => $user_cat->id,
                        'notify_to' => $admin->id,
                        'message' => Auth::user()->name.' Reports '.NFTCategory::find($request->category_id)->name.' Category',
                        'created_at' => Carbon::now(),
                    ]);
                }

                return response()->json([
                    'status' => 200,
                    'message' => "Report Place Success !",
                ]);
            }else{
                return response()->json(['message' => "Please Select a Report !"]);
            }
        }else{
            return response()->json(['message' => "You Already Reported !"]);
        }
    }

    public function ItemProblemDestroy($id)
    {
        $itemProblem = ItemProblem::find($id);
        $itemProblem->delete();
        return back()->withDanger('Report Deleted Success !');
    }

    public function user_report_destroy($id)
    {
        $delete_notify = Notification::where('type_id',$id)->get();
        foreach($delete_notify as $not){
            $not->delete();
        }

        ReportUser::find($id)->delete();
        return back()->withDanger('Report Deleted Success !');
    }

    public function report_cat_destroy($id)
    {
        $delete_notify = Notification::where('type_id',$id)->get();
        foreach($delete_notify as $not){
            $not->delete();
        }

        ReportCategory::find($id)->delete();
        return back()->withDanger('Report Deleted Success !');
    }


}
