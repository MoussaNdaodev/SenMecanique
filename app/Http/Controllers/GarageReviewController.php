<?php

namespace App\Http\Controllers;

use App\Models\Evaluation_Garage;
use App\Models\Garage;
use App\Models\Notification;
use App\Notifications\StatusNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GarageReviewController extends Controller
{

    public function destroy($id)
    {
        $review=Evaluation_Garage::find($id);
        $status=$review->delete();
        if($status){
            request()->session()->flash('success','Successfully deleted review');
        }
        else{
            request()->session()->flash('error','Something went wrong! Try again');
        }
        return redirect()->route('review.index');
    }

    public function update(Request $request, $id)
    {
        $review=Evaluation_Garage::find($id);
        if($review){
            $data=$request->all();
            $status=$review->fill($data)->update();

            if($status){
                request()->session()->flash('success','Votre avis a été mis a jour correctement');
            }
            else{
                request()->session()->flash('error','Something went wrong! Please try again!!');
            }
        }
        else{
            request()->session()->flash('error',"Ce commentaire n'a pas été créer!");
        }

        return redirect()->route('review.index');
    }

    public function edit($id)
    {
        $review=Evaluation_Garage::find($id);
        // return $review;
        return view('backend.review.edit')->with('review',$review);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'note_evaluation'=>'required|numeric|min:1',
            "commentaire_evaluation"=>'required|string|min:10',
        ]);
        $garage_info=Garage::with(['image_garage','localisation','user',"evaluation_garage","demande_assistance"])->where('id',$request->slug)->first();
        $data=$request->all();
        $data['garage_id']=$garage_info->id;
        $data['user_id']= Auth::id();
        // dd( $data['user_id']);
        $status=Evaluation_Garage::create($data);

        $user=User::where('role','admin')->get();
        $details=[
            'title'=>'New Product Rating!',
            'actionURL'=>route('garage-detail',$garage_info->id),
            'fas'=>'fa-star'
        ];
        // Notification::send($user,new StatusNotification($details));
        // $user->notify(new StatusNotification($details));
        if($status){
            request()->session()->flash('success','Merci pour vos commentaires');
        }
        else{
            request()->session()->flash('error','Something went wrong! Please try again!!');
        }
        return redirect()->back();
    }
}











