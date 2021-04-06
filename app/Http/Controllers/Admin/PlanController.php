<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate(5);
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());
        
        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        if (!$plan = $this->repository->where('url', $url)->first()) {
            return redirect()
                            ->back()
                            ->with('error', 'Nenhum registro encontrado');            
        }

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back()->with('error', 'Nenhum registro encontrado');
        
        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back()->with('error', 'Nenhum registro encontrado');

        $plan->update($request->all());

        return redirect()->route('plans.index')->with('message', 'Registro alterado com sucesso!');
    }

    public function destroy($url)
    {
        $plan = $this->repository
                        ->with('details')
                        ->where('url', $url)
                        ->first();

        if (!$plan)
            return redirect()->back();
        
        if ($plan->details->count() > 0) {
            return redirect()
                        ->back()
                        ->with('error', 'Antes de deletar o plano, você deve deletar vos detalhes vinculados a ele!');
        }

        $plan->delete();

        return redirect()->route('plans.index')->with('message', 'Registro deletado com sucesso!');
    }

    public function search(Request $request) { 
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }
}
