<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\OneShotLink\DTOs\CreateOneShotLinkDTO;
use App\Application\OneShotLink\Services\OneShotLinkManager;
use App\Domain\OneShotLink\Events\LinkOpened;
use App\Interfaces\Http\Requests\OneShotLinkSaveRequest;
use Inertia\Inertia;

class OneShotLinkController extends Controller
{
    public function __construct(protected OneShotLinkManager $oneShotLinkManager)
    {
    }

    public function index()
    {
        return Inertia::render('OneShotLink/index');
    }

    public function create(OneShotLinkSaveRequest $request)
    {
        $data = $request->validated();

        $link = new CreateOneShotLinkDTO(body: $data['body'], ttl: $data['ttl']);

        $link = $this->oneShotLinkManager->createLink($link);
        return response()->json([
            'link' => route('link.show', $link->id)
        ]);
    }

    public function show(string $id)
    {
        try {
            $link = $this->oneShotLinkManager->openOneShotLink($id);

            $time = now();
            event(new LinkOpened($link, $time));

            return Inertia::render('OneShotLink/link', ['link' => $link]);
        } catch (\Throwable $exception) {
            return Inertia::render('OneShotLink/link', ['error' => $exception->getMessage()]);
        }
    }
}

