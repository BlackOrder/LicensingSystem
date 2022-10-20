<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutelessApiRequestsController extends Controller
{
  public function index(Request $request)
  {
    return response()->json([
      "error" => "Request not found",
      "code" => 404,
    ], 404);
  }
}