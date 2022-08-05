<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\WalletBanner;
use Illuminate\Http\Request;
use App\Models\WalletServices;

class WalletController extends Controller
{
    public function walletBanner(){
        return view('admin.wallet.banner.index', ['bannerData' => WalletBanner::first()]);
    }

    public function walletBannerUpdate(Request $request, $id){
        $request->validate(['title' => 'required', 'image' => 'image']);
        $updatableData = WalletBanner::where('id', $id)->first();
        $updatableData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $location = public_path('uploads/images/wallet');
            $fileName = uniqid() . '.' . $image->extension();
            $image->move($location, $fileName);
            $updatableData->image = $fileName;
            $updatableData->save();
        }
        return back()->withSuccess('Banner Update Success !');
    }

    public function walletServices(){
        return view('admin.wallet.services.index', ['serviceData' => WalletServices::all()]);
    }

    public function walletServicesCreate(){
        return view('admin.wallet.services.create');
    }

    public function walletServicesStore(Request $request){
        $request->validate(['image' => 'image|required', 'title' => 'required', 'description' => 'required']);
        $walletData = WalletServices::create($request->except('_token') + ['created_at' => Carbon::now()]);
        if($request->hasFile('image')){
            $svg = $request->file('image');
            $location = public_path('uploads/images/wallet');
            $fileName = uniqid() . '.' . $svg->extension();
            $svg->move($location, $fileName);
            $walletData->image = $fileName;
            $walletData->save();
        };
        return redirect()->route('wallet.services')->withSuccess('Service Added Succesfully !');
    }

    public function walletServicesEdit($id){
        return view('admin.wallet.services.edit', ['service' => WalletServices::where('id', $id)->first()]);
    }

    public function walletServicesUpdate(Request $request, $id){
        $request->validate(['image' => 'image', 'title' => 'required', 'description' => 'required']);
        $updatableData = walletServices::where('id', $id)->first();
        $updatableData->update($request->except('_token') + ['update_at' => Carbon::now()]);
        if($request->hasFile('image')){
            $svg = $request->file('image');
            $location = public_path('uploads/images/wallet');
            $fileName = uniqid() . '.' . $svg->extension();
            $svg->move($location, $fileName);
            $updatableData->image = $fileName;
            $updatableData->save();
        };
        return redirect()->route('wallet.services')->withSuccess('Service Update Succesfully !');
    }

    public function walletServicesDelete($id){
        WalletServices::where('id', $id)->delete();
        return back()->withSuccess('Service Deleted Successfull !');
    }
}
