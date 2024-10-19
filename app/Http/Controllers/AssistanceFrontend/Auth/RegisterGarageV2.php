<?php

namespace App\Http\Controllers\AssistanceFrontend\Auth;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationInscription;
use App\Models\Garage;
use App\Models\Image_Garage;
use App\Models\Localisation;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Validator;

class RegisterGarageV2 extends Controller
{
    public function register2(Request $request){
        $user = $request->session()->get('user_garage');
        return view('frontend.assistance.pages.registerGarageV2')->with("user",$user);
    }
    public function registerSubmit2(Request $request){
        $validator = Validator::make($request->all(), [
            'logo_garage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10242',
            'garage_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10242',
            "type_garage" => "required|string|min:4",
            "telephone" => "required|string|min:4",
            "nombre_mécanicien" => "required|integer|min:1",
            "description" => "required|string|min:4",
            "latitude" => "required|string|min:4",
            "longitude" => "required|string|min:4",
            "jour_travail" => "required|string|min:4",
            "service_garage"=>"required|string|min:4",
        ], [
            'logo_garage.image' => 'Le logo doit être une image valide.',
            'logo_garage.mimes' => 'Le logo doit être au format : jpeg, png, jpg, gif.',
            'logo_garage.max' => 'Le logo ne doit pas dépasser 10 Mo.',
            'garage_images.*.image' => 'Les photos doivent être des images valides.',
            'garage_images.*.mimes' => 'Les photos doivent être au format : jpeg, png, jpg, gif.',
            'garage_images.*.max' => 'Les photos ne doivent pas dépasser 10 Mo.',
            'type_garage.required' => 'Le type de garage est requis.',
            'telephone.required' => 'Le numéro de téléphone est requis.',
            'nombre_mécanicien.required' => 'Le nombre de mécaniciens est requis.',
            'nombre_mécanicien.integer' => 'Le nombre de mécaniciens doit être un nombre entier.',
            'description.required' => 'La description est requise.',
            'latitude.required' => 'La latitude est requise.',
            'latitude.string' => 'La latitude doit être un nombre.',
            'longitude.required' => 'La longitude est requise.',
            'longitude.string' => 'La longitude doit être un nombre.',
            'jour_travail.required' => 'Les jours de travail sont requis.',
            'service_garage.required'=> 'le service proposé doit être rempli',
        ]);

        // Vous pouvez tester le contenu des messages d'erreur ici
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }


        $logo_chemin = null;
        if ($request->hasFile('logo_garage')) {
            $logoPath = $request->file('logo_garage')->store('frontend/img/assistance/garages/logos',"public");
            // move_uploaded_file($request->file("logo_garage"),"app/public/frontend/img/assistance/garages/logos");
            $logo_chemin = $logoPath;
        }


        // dd($imagesPaths);
        $localisation = new Localisation();
        $localisation->latitude = $request->latitude;
        $localisation->longitude = $request->longitude;
        $localisation->save();

        $garage = new Garage();
        $garage->logo =$logo_chemin;
        $garage->description=$request->description;
        $garage->jour_travail = $request->jour_travail;
        $garage->type_garage = $request->type_garage;
        $garage->telephone_garage = $request->telephone;
        $garage->nombre_mecanicien = $request->nombre_mécanicien;
        $garage->service_garage =  $request->service_garage;
        $garage->localisation()->associate($localisation);
        $garage->user()->associate($request->user_garage);
        $garage->save();
        // Gestion des images
        $imagesPaths = [];
        if ($request->hasFile('garage_images')) {
            foreach ($request->file('garage_images') as $image) {
                $imagePath = $image->store('frontend/img/assistance/garages/images',"public");
                // move_uploaded_file($image,"app/public/frontend/img/assistance/garages/images");
                $image_garage = new Image_Garage();
                $image_garage->url = $imagePath;
                $image_garage->garage()->associate($garage);
                $image_garage->save();
            }
        }

        Mail::to($garage->user->email)->send(new ConfirmationInscription($garage));
        return view("success");


    }


}


