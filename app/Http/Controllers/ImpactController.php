<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\ResearchItem;
use App\Models\UserTest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ImpactController extends Controller
{
    public function home(): Response
    {
        return Inertia::render('Welcome', ['authenticated' => (bool) Auth::user()]);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required|string']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors(['email' => 'The email or password is incorrect.']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function dashboard(): Response
    {
        return Inertia::render('Dashboard', $this->metrics());
    }

    public function research(): Response
    {
        return Inertia::render('Research', ['items' => ResearchItem::latest()->get()]);
    }

    public function storeResearch(Request $request): RedirectResponse
    {
        ResearchItem::create($this->validatedResearch($request));
        return back()->with('success', 'Research evidence saved.');
    }

    public function updateResearch(Request $request, ResearchItem $researchItem): RedirectResponse
    {
        $researchItem->update($this->validatedResearch($request));
        return back()->with('success', 'Research evidence updated.');
    }

    public function destroyResearch(ResearchItem $researchItem): RedirectResponse
    {
        $researchItem->delete();
        return back()->with('success', 'Research evidence deleted.');
    }

    public function prototype(): Response
    {
        return Inertia::render('Prototype');
    }

    public function storeFeedback(Request $request): RedirectResponse
    {
        Feedback::create($request->validate([
            'participant_name' => 'required|string|max:80',
            'role' => 'nullable|string|max:120',
            'rating' => 'required|integer|min:1|max:5',
            'pain_point' => 'nullable|string|max:3000',
            'suggestion' => 'nullable|string|max:3000',
            'would_continue' => 'required|boolean',
            'notes' => 'nullable|string|max:5000',
        ]));
        return back()->with('success', 'Feedback saved.');
    }

    public function results(): Response
    {
        $tests = UserTest::where('is_demo', false)->latest()->get();
        $feedback = Feedback::where('is_demo', false)->latest()->get();
        return Inertia::render('Results', [
            'tests' => $tests,
            'feedback' => $feedback,
            'metrics' => $this->calculateMetrics($tests, $feedback),
            'demo_records' => UserTest::where('is_demo', true)->count() + Feedback::where('is_demo', true)->count(),
        ]);
    }

    public function storeTest(Request $request): RedirectResponse
    {
        UserTest::create($request->validate([
            'participant_name' => 'required|string|max:80',
            'task' => 'required|string|max:255',
            'manual_minutes' => 'required|integer|min:1|max:1440',
            'prototype_minutes' => 'required|integer|min:1|max:1440',
            'success' => 'required|boolean',
            'error_count' => 'required|integer|min:0|max:1000',
            'comments' => 'nullable|string|max:5000',
        ]));
        return back()->with('success', 'Usability test saved.');
    }

    public function futurePlan(): Response
    {
        return Inertia::render('FuturePlan');
    }

    private function validatedResearch(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:180',
            'source_type' => 'required|string|max:100',
            'summary' => 'required|string|max:5000',
            'finding' => 'required|string|max:3000',
            'impact' => 'nullable|string|max:3000',
        ]);
    }

    private function metrics(): array
    {
        $tests = UserTest::where('is_demo', false)->get();
        $feedback = Feedback::where('is_demo', false)->get();

        return [
            'metrics' => $this->calculateMetrics($tests, $feedback) + ['research' => ResearchItem::count()],
            'demo_records' => UserTest::where('is_demo', true)->count() + Feedback::where('is_demo', true)->count(),
        ];
    }

    private function calculateMetrics($tests, $feedback): array
    {
        $manual = $tests->sum('manual_minutes');
        $prototype = $tests->sum('prototype_minutes');
        $saved = $manual - $prototype;

        return [
            'participants' => $feedback->pluck('participant_name')->merge($tests->pluck('participant_name'))->unique()->count(),
            'tests' => $tests->count(),
            'success_rate' => $tests->count() ? (int) round($tests->where('success', true)->count() / $tests->count() * 100) : 0,
            'time_saved' => $saved,
            'time_saved_pct' => $manual ? (int) round($saved / $manual * 100) : 0,
            'avg_rating' => $feedback->count() ? round($feedback->avg('rating'), 1) : 0,
            'continue_rate' => $feedback->count() ? (int) round($feedback->where('would_continue', true)->count() / $feedback->count() * 100) : 0,
            'evidence_status' => $tests->count() && $feedback->count() ? 'real' : 'pending',
        ];
    }
}
