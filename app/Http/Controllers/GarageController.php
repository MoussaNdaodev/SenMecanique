<?php

namespace App\Http\Controllers;

use App\Mail\asssitanceRequest;
use App\Mail\ConfirmationDemande;
use App\Models\Demande_Assistance;
use App\Models\Garage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class GarageController extends Controller
{
    public function garageDetail($slug)
    {
        $garage_detail = Garage::with(['image_garage', 'localisation', 'user', "evaluation_garage", "demande_assistance"])->where('id', $slug)->first();
        $garage_detail_user = $garage_detail->User;
        // dd($garage_detail_user);
        $garage_detail_localisation = $garage_detail->localisation;
        $garage_detail_evaluation = $garage_detail->evaluation_garage;
        $garage_detail_images = $garage_detail->image_garage;
        // dd($garage_detail_images);
        return view("frontend.assistance.pages.garage_details")->with("garage_information", ["garage_user" => $garage_detail_user, "garage_detail" => $garage_detail, "localisation" => $garage_detail_localisation, "evaluation" => $garage_detail_evaluation, "images" => $garage_detail_images, "garage_user" => $garage_detail_user,]);
    }

    public function serviceRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type_service' => 'required|string|min:4',
            'problem_description' => 'required|string|min:4',
        ], [
            'type_service.required' => 'Le type de service est requis.',
            'type_service.string' => 'Le type de service doit être une chaîne de caractères.',
            'type_service.min' => 'Le type de service doit comporter au moins 4 caractères.',
            'problem_description.required' => 'La description du problème est requise.',
            'problem_description.string' => 'La description du problème doit être une chaîne de caractères.',
            'problem_description.min' => 'La description du problème doit comporter au moins 4 caractères.',
        ]);
        $assistance_demande = new Demande_Assistance();
        $assistance_demande->description_probleme = $request->description_probleme;
        $assistance_demande->garage_id = $request->garage_id;
        $assistance_demande->user_id = Auth::id();
        $assistance_demande->type_service =  $request->type_service;
        $assistance_demande->save();
        Mail::to($assistance_demande->user->email)->send(new asssitanceRequest($assistance_demande));
        request()->session()->flash('success', 'votre demande a été envoyé avec success');
        return redirect()->route("AssistanceHome");
    }
    public function serviceRequestValidation($id) {
        $demande = Demande_Assistance::find($id);
        // dd($demande);
        if($demande) {
            $demande->status = "En cour";
            Mail::to($demande->user->email)->send(new ConfirmationDemande());
        }
        request()->session()->flash('success', 'votre demande a été confirmer');
        return redirect()->route("AssistanceHome");
    }
}
