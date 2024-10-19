<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use App\Models\Garage;
use App\Models\Post;

class FrontendAssistanceController extends Controller
{
    public function home()
    {
        if (Auth::user() == null) {
            return view("frontend.assistance.pages.assist");
        } else {
            $latitude = session('latitude');
            $longitude = session('longitude');

            if ($latitude && $longitude) {
                $garage_detail_geo = $this->getGaragesSortedByDistance($latitude, $longitude);
                // dd($garage_detail_geo[0]->garage->logo);
            } else {
                $garage_detail_geo = Garage::with(['image_garage', 'localisation', 'user', "evaluation_garage", "demande_assistance"])->limit(4)->get();
                // dd($garage_detail_geo);
            }

            $garage_detail = Garage::with(['image_garage', 'localisation', 'user', "evaluation_garage", "demande_assistance"])
                ->withAvg('evaluation_garage', 'note_evaluation')
                ->orderBy('evaluation_garage_avg_note_evaluation', 'desc')
                ->limit(10)
                ->get();

            $banners = Banner::where('status', 'active')->limit(3)->orderBy('id', 'DESC')->get();
            $posts = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

            return view("frontend.assistance.index")
                ->with('banners', $banners)
                ->with('posts', $posts)
                ->with("garage_detail", $garage_detail)
                ->with("garage_detail_geo", $garage_detail_geo);
        }
    }

    public function storeLocation(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        session(['latitude' => $request->latitude, 'longitude' => $request->longitude]);
    }

    private function getGaragesSortedByDistance($latitude, $longitude)
    {
        $garages = Garage::with(['image_garage', 'localisation', 'user', 'evaluation_garage', 'demande_assistance'])->get();

        $garagesWithDistance = [];

        foreach ($garages as $garage) {
            $distance = $this->calculateDistance($latitude, $longitude, $garage->latitude, $garage->longitude);
            $garagesWithDistance[] = (object) [
                'garage' => $garage,
                'distance' => $distance,
            ];
        }
        usort($garagesWithDistance, function ($a, $b) {
            return $a->distance <=> $b->distance;
        });
        // Extraire seulement les objets 'garage' après le tri
        $garagesSorted = array_map(function ($item) {
            return $item->garage;
        }, $garagesWithDistance);

        return $garagesSorted;
    }

    private function calculateDistance($latitude_user, $longitude_user, $latitude_garage, $longitude_garage)
    {
        $earthRadius = 6371; // Rayon de la Terre en kilomètres

        $latFrom = deg2rad($latitude_user);
        $lonFrom = deg2rad($longitude_user);
        $latTo = deg2rad($latitude_garage);
        $lonTo = deg2rad($longitude_garage);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        $distance = $earthRadius * $angle; // Distance en kilomètres

        return $distance;
    }
}
