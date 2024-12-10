<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Jobs\RequestConsultationMailSendJob;
use App\Jobs\RequestConsultationVacancyMailSendJob;
use App\Jobs\RequestCooperationMailSendJob;
use App\Jobs\RequestMailingMailSendJob;
use App\Jobs\RequestVacancyMailSendJob;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class RequestsController extends Controller
{


  public function request_vacancy_section(Request $request)
  {
    $details = [
      'vacancy' => Vacancy::where('id', $request->all()['vacancy_id'])->first()->title,
      'name' => $request->all()['name'],
      'phone' => $request->all()['phone'],
    ];
    try {
      dispatch(new RequestVacancyMailSendJob($details));
      return response()->json(['success' => true]);
    } catch (\Exception $e) {
      return response()->json(['success' => false]);
    }
  }
  public function request_consultation_vacancy_section(Request $request)
  {

      return response()->json(['success' => true]);

  }
  public function request_cooperation_section(Request $request)
  {
    $details = [
      'company' => $request->all()['company'],
      'name' => $request->all()['name'],
      'phone' => $request->all()['phone'],
      'email' => $request->all()['email'],
    ];
    try {
      dispatch(new RequestCooperationMailSendJob($details));
      return response()->json(['success' => true]);
    } catch (\Exception $e) {
      return response()->json(['success' => false]);
    }
  }
  public function request_consultation_section(Request $request)
  {
    $details = [
      'name' => $request->all()['name'],
      'phone' => $request->all()['phone'],
    ];
    try {
      dispatch(new RequestConsultationMailSendJob($details));
      return response()->json(['success' => true]);
    } catch (\Exception $e) {
      return response()->json(['success' => false]);
    }

  }
  public function request_mailing_section(Request $request)
  {
    $details = [
      'name' => $request->all()['name'],
      'email' => $request->all()['email'],
    ];
    try {
      dispatch(new RequestMailingMailSendJob($details));
      return response()->json(['success' => true]);
    } catch (\Exception $e) {
      return response()->json(['success' => false]);
    }

  }
}
