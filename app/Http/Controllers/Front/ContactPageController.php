<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Contact;
use App\Models\Management;
use App\Models\Page;

class ContactPageController extends Controller
{
    public function index()
    {
        $page = Page::whereId(8)->firstOrFail();
        $contact_main_management_department = Contact::whereId(1)->first();
        $contact_main_representation = Contact::whereId(2)->first();
        $contacts_branch = Contact::where('office_type', 'branch')->get();
        return view('contacts', compact(
            'page',
            'contact_main_management_department',
            'contact_main_representation',
            'contacts_branch'
        ));
    }
}
