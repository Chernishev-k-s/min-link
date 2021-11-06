<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkStoreRequest;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use App\Services\HashGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    public function index()
    {
    }

    public function create(Request $request)
    {
    }

    public function store(LinkStoreRequest $request)
    {
        $link = Link::create($request->input());
        $link->update(['hash' => HashGeneratorService::encode($link->id)]);

        return new LinkResource($link);
    }

    public function show($hash)
    {
        $link = Link::where('hash', $hash)->firstOrFail();

        return redirect($link->url);
    }
    public function show_info($hash)
    {
        $link = Link::where('hash', $hash)->firstOrFail();

        return new LinkResource($link);
    }
}
