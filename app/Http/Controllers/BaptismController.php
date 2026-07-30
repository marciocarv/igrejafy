<?php

namespace App\Http\Controllers;

use App\Data\BaptismData;
use App\Http\Requests\StoreBaptismRequest;
use App\Http\Requests\UpdateBaptismRequest;
use App\Models\Person;
use App\Services\BaptismService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BaptismController extends Controller
{
    public function __construct(
        private readonly BaptismService $baptismService
    ) {
    }

    public function index(Person $person): View
    {
        $baptism = $this->baptismService->get($person);

        return view('people.baptism.index', [
            'person' => $person,
            'baptism' => $baptism,
        ]);
    }

    public function store(
        StoreBaptismRequest $request,
        Person $person
    ): RedirectResponse {
        $this->baptismService->save(
            $person,
            BaptismData::fromRequest($request)
        );

        return redirect()
            ->route('people.show', $person)
            ->with('success', 'Batismo registrado com sucesso.');
    }

    public function update(
        UpdateBaptismRequest $request,
        Person $person
    ): RedirectResponse {
        $baptism = $this->baptismService->get($person);

        abort_unless($baptism, 404);

        $this->baptismService->save(
            $person,
            BaptismData::fromRequest($request)
        );

        return redirect()
            ->route('people.show', $person)
            ->with('success', 'Batismo atualizado com sucesso.');
    }

    public function certificate(Person $person): View
    {
        $baptism = $this->baptismService->get($person);

        abort_unless($baptism, 404);

        return view('people.baptism.certificate', [
            'person' => $person,
            'baptism' => $baptism,
        ]);
    }
}
