<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; 


class NoteController extends Controller
{
    public function index(): Response
    {
        return response('Hello, World!');

    }
}
