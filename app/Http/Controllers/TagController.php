<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag;
use App\Http\Requests\TagCreateRequest;

class TagController extends Controller
{
    //
    public function store(TagCreateRequest $request){   
        Tag::create($request->all());
        flash()->success('Added New Tag!');
        return redirect('/');
    }
}
