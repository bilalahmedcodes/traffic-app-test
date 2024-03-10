@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Total number of unique visitors: {{ $totalUniqueVisitors ?? 0 }}</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <p class="fw-bold text-body-emphasis">Total number of visitors for each stage</p>
                <ul>
                    @foreach ($totalVisitorsByStage as $stage)
                        <li>{{ ucfirst($stage->stage) ?? '' }}: {{ $stage->total ?? 0 }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
