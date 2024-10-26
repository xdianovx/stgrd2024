<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\Contact\UpdateRequest;
use App\Models\City;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ContactController extends Controller
{
  public function index()
  {
      $user = Auth::user();
      $contacts = Contact::orderBy('id', 'DESC')->paginate(10);
      return view('admin.contacts.index', compact('contacts','user'));
  }

  public function show($contact_id)
  {
      $user = Auth::user();
      $item = Contact::whereId($contact_id)->firstOrFail();
      return view('admin.contacts.show', compact('item','user'));
  }

  public function create()
  {
      $user = Auth::user();
      $cities = City::all();
      return view('admin.contacts.create', compact('user','cities'));
  }
  public function store(StoreRequest $request)
  {
      $data = $request->validated();
      $data['office_type'] = 'branch';
      $data = $this->changeTitleToId($data);
      $data['phone'] = json_encode($data['phone']);
      Contact::firstOrCreate($data);
      return redirect()->route('admin.contacts.index')->with('contact', 'item-created');
  }
  public function edit($contact_id)
  {
      $user = Auth::user();
      $cities = City::all();
      $item = Contact::whereId($contact_id)->firstOrFail();
      return view('admin.contacts.edit', compact('user','item','cities'));
  }
  public function update(UpdateRequest $request, $contact_id)
  {
      $contact = Contact::whereId($contact_id)->firstOrFail();
      $data = $request->validated();
      if ($contact->office_type == 'main') {
          unset($data['office_type']);
      } else {
          $data['office_type'] = 'branch';
      }
      $data['phone'] = json_encode($data['phone']);
      $data = $this->changeTitleToId($data);
      $contact->update($data);
      return redirect()->route('admin.contacts.index')->with('contact', 'item-updated');
  }

  public function destroy($contact_id)
  {
      $contact = Contact::whereId($contact_id)->firstOrFail();
      $contact->delete();
      return redirect()->route('admin.contacts.index')->with('contact', 'item-deleted');
  }

  public function search(Request $request)
  {
      $user = Auth::user();
      if (request('search') == null) :
          $contacts = Contact::orderBy('id', 'DESC')->paginate(10);
      else :
          $contacts = Contact::where('title', 'ilike', '%' . request('search') . '%')
          ->orWhereHas('city', function($query) {
              $query->where('title', 'ilike', '%' . request('search') . '%');
            })
          ->paginate(10);
      endif;
      return view('admin.contacts.index', compact('contacts','user'));
  }
  protected function changeTitleToId($data)
  {
    if (isset($data['city_id'])) :
      $data['city_id'] = City::where('title', $data['city_id'])->first()->id;
    endif;

    return $data;
  }
}
