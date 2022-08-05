<?php

namespace App\Http\Controllers;

use App\Models\PartnerBrandImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PartnerReview;
use App\Models\PartnerSignUp;
use App\Models\PartnerTitles;
use App\Models\PartnerService;
use App\Models\PartnerTopSection;

class PartnerController extends Controller
{
    public function titleAndDescriptions(){
        return view('admin.partner.titles.index', [
            'partnerTitles' => PartnerTitles::first(),
        ]);
    }

    public function titleAndDescriptionsUpdate(Request $request, $id){
        $request->validate(['title1' => 'required','description1' => 'required', 'title2' => 'required', 'description2' => 'required','title3' => 'required', 'description3' => 'required']);
        $partnerTitlles = PartnerTitles::where('id', $id)->first();
        $partnerTitlles->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess('titles Update Sucessfull !');
    }

    public function partnerTopSection(){
        return view('admin.partner.topSection.index', [
            'partnerTopSection' => PartnerTopSection::first(),
        ]);
    }

    public function partnerTopSectionUpdate(Request $request, $id){
        $request->validate(['icon1' => 'required', 'text1' => 'required', 'icon2' => 'required', 'text2' => 'required', 'icon3' => 'required', 'text3' => 'required']);
        $partnerTopSection = PartnerTopSection::first();
        $partnerTopSection->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess('Top Section Updated Success !');
    }

    public function partnerServiceSectionIndex(){
        return view('admin.partner.partnerService.index', [
            'partnerService' => PartnerService::all(),
        ]);
    }

    public function partnerServiceSectionCreate(){
       return view('admin.partner.partnerService.create');
    }

    public function partnerServiceSectionStore(Request $request){
        $request->validate([ 'icon' => 'required', 'title' => 'required', 'description' => 'required']);
        PartnerService::create($request->except('_token') + ['created_at' => Carbon::now()]);
        return redirect()->route('partner.service.index')->withSuccess('parter Service Created Success !');
    }

    public function partnerServiceSectionEdit($id){
        $partnerService = PartnerService::where('id', $id)->first();
        return view('admin.partner.partnerService.edit', compact('partnerService'));
     }

    public function partnerServiceSectionUpdate(Request $request, $id){
        $request->validate([ 'icon' => 'required', 'title' => 'required', 'description' => 'required']);
        $serviceSection = PartnerService::where('id', $id);
        $serviceSection->update($request->except('_token', '_method') + ['updated_at' => Carbon::now()]);
        return redirect()->route('partner.service.index')->withSuccess('Partner Service Section Updated Success !');
    }

    public function partnerServiceSectionDelete($id){
        $service = partnerService::where('id', $id);
        $service->delete();
        return redirect()->route('partner.service.index')->withDanger('Service Deleted Success !');
    }

    public function partnerReviewIndex(){
        $partnerReview = PartnerReview::all();
        return view('admin.partner.partnerReview.index', compact('partnerReview'));
    }
    public function partnerReviewCreate(){
        return view('admin.partner.partnerReview.create');
    }

    public function partnerReviewStore(Request $request){
        $request->validate(['comment' => 'required', 'name' => 'required', 'designation' => 'required', 'image' => 'required']);
        $partnerReview = PartnerReview::create($request->except('_token') + ['created_at' => Carbon::now()]);


        $location = public_path('uploads/images/partner/partnerReview');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid() . "image." . $image->extension();
            $image->move($location, $fileName);
            $partnerReview->image = $fileName;
            $partnerReview->save();
        }
        return redirect()->route('partner.review.index')->withSuccess('Review Create Successful !');
    }

    public function partnerReviewEdit($id){
        return view('admin.partner.partnerReview.edit',[
            'partnerReview' => PartnerReview::where('id', $id)->first(),
        ]);
    }
    public function partnerReviewUpdate(Request $request, $id){
        $request->validate(['comment' => 'required', 'name' => 'required', 'designation' => 'required']);
        $partnerReview = PartnerReview::where('id', $id)->first();
        $request->validate(['comment' => 'required', 'name' => 'required']);
        $partnerReview->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        $location = public_path('uploads/images/partner/partnerReview');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid() . "image." . $image->extension();
            $image->move($location, $fileName);
            $partnerReview->image = $fileName;
            $partnerReview->save();
        }
        return redirect()->route('partner.review.index')->withSuccess('Review Create Successful !');
    }

    public function partnerReviewDestroy($id){
        $partnerReview = PartnerReview::find($id);
        $partnerReview->delete();
        return redirect()->route('partner.review.index')->withDanger('Review Deleted Successful !');
    }

    public function partnerSignUpIndex(){
        $partnerSignUp = PartnerSignUp::first();
        return view('admin.partner.partnerSignUp.index', compact('partnerSignUp'));
    }

    public function partnerSignUpUpate(Request $request, $id){
        $request->validate(['title' => 'required', 'meta_title' => 'required', 'btn_text' => 'required', 'btn_url' => 'required']);
        $signUpData = PartnerSignUp::where('id', $id)->first();
        $signUpData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess('Data Updated success !');
    }

    public function partnerBrandImageIndex(){
        return view('admin.partner.brandImage.index', [
            'brandImage' => PartnerBrandImage::all(),
        ]);
    }

    public function partnerBrandImageCreate(){
        return view('admin.partner.brandImage.create');
    }

    public function partnerBrandImageStore(Request $request){
        $request->validate(['image' => 'required|image']);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid() . 'BrandImage.' . $image->extension();
            $location = public_path('uploads/images/partner/brand');
            $image->move($location, $fileName);
            PartnerBrandImage::create(['image' => $fileName, 'created_at' => Carbon::now()]);
            return redirect()->route('partner.brandImage.index')->withSuccess('Image Created Success !');
        }
    }
    public function partnerBrandImageEdit($id){
        return view('admin.partner.brandImage.edit', ['brandImage' => PartnerBrandImage::where('id', $id)->first()]);
    }

    public function partnerBrandImageUpdate(Request $request, $id){
        $imageData = PartnerBrandImage::where('id', $id)->first();
        $imageData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid() . 'BrandImage.' . $image->extension();
            $location = public_path('uploads/images/partner/brand');
            $image->move($location, $fileName);
            $imageData->image = $fileName;
            $imageData->save();
            return redirect()->route('partner.brandImage.index')->withSuccess('Image Created Success !');
        }
    }

    public function partnerBrandImageDestroy($id){
        $ImageData = PartnerBrandImage::where('id', $id)->first();
        $ImageData->delete();
        return back()->withDanger('Image Deleted Success !');
    }
}
