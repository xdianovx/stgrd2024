<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{

  public function index()
  {
    $user = Auth::user();
    $newsletters = Newsletter::all();
    return view('admin.newsletters.index', compact('newsletters', 'user'));
  }

  public function show(Newsletter $newsletter)
  {
      $user = Auth::user();
      return view('admin.newsletters.show', compact('newsletter', 'user'));
  }


  public function update(Request $request, Newsletter $newsletter)
  {
    $newsletter->update($request->only('mailing_status'));
    return redirect()->route('admin.newsletters.index')->with('success', 'item-updated');
  }

  public function destroy(Newsletter $newsletter)
  {
    $newsletter->delete();
    return redirect()->route('admin.newsletters.index')->with('success', 'item-deleted');
  }


  public function search(Request $request)
  {
      $user = Auth::user();
      if (request('search') == null) :
          $news = Newsletter::orderBy('id', 'DESC')->paginate(10);
      else :
          $news = Newsletter::where('id', 'ilike', '%' . request('search') . '%')
              ->orWhere('slug', 'ilike', '%' . request('search') . '%')
              ->orWhere('title', 'ilike', '%' . request('search') . '%')
              ->paginate(10);
      endif;
      return view('admin.newsletters.index', compact('news', 'user'));
  }
}
