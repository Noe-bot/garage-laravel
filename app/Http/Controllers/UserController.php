<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddMoneyWalletRequest;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\Annoucements;
use App\Models\Comments;
use App\Services\CannotReservedVehicleLockedException;
use App\Services\VehicleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateVehicleRequest;
use App\Http\Requests\ReservedVehicleRequest;
use App\Services\UserHasNotEnoughMoneyException;

class UserController extends Controller
{
    public function settings(Request $request)
    {
        $user = $request->user();

        return view('users.settings', ['user' => $user]);
    }

    public function addMoney(AddMoneyWalletRequest $request)
    {
        $user = $request->user();

        $user->update([
           'wallet' => $user->wallet + $request->get('amount'),
        ]);

        return redirect()->back();
    }

    public function reservations(Request $request)
    {
        $user = $request->user();

        $reservations = $user->vehicles;

        return view('users.reservations', ['reservations' => $reservations]);
    }

    public function AnnouncementsList(Request $request)
    {

        $annoucement = Annoucements::all();

        $user = $request->user();

        $current_user = $user->id;

        return view('users.Listviewing', ['annoucement' => $annoucement, 'current_user' => $current_user]);


    }

    public function AnnouncementsCreation()
    {
        return view('users.FormCreateAnnoucement');
    }

    public function AnnouncementsCreationAdd(Request $request)
    {

        $user = $request->user();


        $NewAnnoucement = array(
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'price' => $request->get('price'),
            'user_id' => $user->id,
            'enabled' => true,
            'created_at' => '2021-02-04 11:30:39',
            'updated_at' => '2021-01-04 11:30:39',
        );




        Annoucements::create($NewAnnoucement);

        $annoucement = Annoucements::all();

        $user = $request->user();

        $current_user = $user->id;

        return view('users.Listviewing', ['annoucement' => $annoucement, 'current_user' => $current_user]);
    }

    public function AnnouncementsSuppr(Request $request, $id)
    {
        Annoucements::where('id','=', $id)->delete();


        $annoucement = Annoucements::all();

        $user = $request->user();

        $current_user = $user->id;

        return view('users.Listviewing', ['annoucement' => $annoucement, 'current_user' => $current_user]);
    }

    public function AnnouncementsEdit($id)
    {
        $annoucement = Annoucements::findOrFail($id);
        return view('users.updateContentAnnoucement', ['annoucement' => $annoucement]);
    }

    public function AnnouncementsEditValidation(Request $request, $id)
    {
        $annoucement = Annoucements::findOrFail($id);

        $annoucement->title = $request->get('title');
        $annoucement->content = $request->get('content');
        $annoucement->price = $request->get('price');
        $annoucement->save();
       
        $annoucement = Annoucements::all();

        $user = $request->user();

        $current_user = $user->id;

        return view('users.Listviewing', ['annoucement' => $annoucement, 'current_user' => $current_user]);

    }

    public function AnnouncementsSee($id)
    {
        $annoucement = Annoucements::findOrFail($id);

        $comments = Comments::all();



        // $comments = Comments::where('annoucement_id', '=', $id);
        

        return view('users.SeeAnnoucement', ['annoucement' => $annoucement, 'comments' => $comments]);
    }


}
