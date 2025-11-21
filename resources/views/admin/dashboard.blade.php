<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Brilian') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Last Scholarships --}}
    <section class="bg-white shadow p-6 border-[3px] border-[#D8E0E4] rounded-2xl">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h2 class="font-cave text-4xl mb-1">Last Scholarships</h2>
                <p class="text-sm text-gray-500">
                    <span class="font-semibold">{{ $scholarshipCount }} total.</span> proceed to create them
                </p>
            </div>

            <div class="flex bg-gray-50 rounded-lg border border-gray-200">
                <div class="px-6 py-2 text-center border-r border-gray-200">
                    <p class="text-3xl font-bold">{{ $userCount }}</p>
                    <p class="text-gray-500 text-sm">Users</p>
                </div>
                <div class="px-6 py-2 text-center">
                    <p class="text-3xl font-bold">{{ $scholarshipCount }}</p>
                    <p class="text-gray-500 text-sm">Scholarships</p>
                </div>
            </div>
        </div>

        <div class="w-full border-t border-gray-200">
            <div class="grid grid-cols-6 text-sm text-gray-500 font-semibold py-3 border-b border-gray-200">
                <span>Name</span>
                <span>Created By</span>
                <span>Image</span>
                <span>Status</span>
                <span>Start Date</span>
                <span>End Date</span>
            </div>

            @forelse ($latestScholarships as $scholarship)
                <div class="grid grid-cols-6 text-sm text-gray-700 py-3 border-b border-gray-100">
                    <span>{{ $scholarship->name }}</span>
                    <span>{{ $scholarship->user->name ?? 'Unknown' }}</span>
                    <span>
                        @if($scholarship->image)
                            <img src="{{ asset('storage/' . $scholarship->image) }}" alt="Scholarship Image" class="w-10 h-10 rounded-lg">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </span>
                    <span>
                        @if($scholarship->is_available)
                            <span class="text-green-600">Open</span>
                        @else
                            <span class="text-gray-400">Closed</span>
                        @endif
                    </span>
                    <span>{{ $scholarship->start_date ? \Carbon\Carbon::parse($scholarship->start_date)->format('d M Y') : '-' }}</span>
                    <span>{{ $scholarship->end_date ? \Carbon\Carbon::parse($scholarship->end_date)->format('d M Y') : '-' }}</span>
                </div>
            @empty
                <div class="py-10 text-center text-gray-400 text-sm">
                    No Scholarships right now
                </div>
            @endforelse
        </div>
    </section>

    {{-- ANALYTICS SECTION --}}
    <section class="bg-white shadow p-6 border-[3px] border-[#D8E0E4] rounded-2xl">
        <h2 class="font-cave text-4xl mb-6">Analytics Overview</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-gray-50 border rounded-xl p-4">
                <h3 class="font-semibold text-lg mb-3">User Growth</h3>
                <canvas id="userGrowthChart"></canvas>
            </div>

            <div class="bg-gray-50 border rounded-xl p-4">
                <h3 class="font-semibold text-lg mb-3">Scholarship Status</h3>
                <canvas id="scholarshipStatusChart"></canvas>
            </div>

            <div class="bg-gray-50 border rounded-xl p-4">
                <h3 class="font-semibold text-lg mb-3">Category Distribution</h3>
                <canvas id="categoryChart"></canvas>
            </div>

        </div>
    </section>

</div>

<script>
    new Chart(document.getElementById('userGrowthChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($usersPerMonth->keys()) !!},
            datasets: [{
                label: 'Users',
                data: {!! json_encode($usersPerMonth->values()) !!},
                borderWidth: 3,
                tension: 0.4
            }]
        }
    });

    new Chart(document.getElementById('scholarshipStatusChart'), {
        type: 'pie',
        data: {
            labels: ['Open', 'Closed'],
            datasets: [{
                data: [{{ $openCount }}, {{ $closedCount }}]
            }]
        }
    });

    new Chart(document.getElementById('categoryChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($categoryData->keys()) !!},
            datasets: [{
                label: 'Scholarships',
                data: {!! json_encode($categoryData->values()) !!},
                borderWidth: 1
            }]
        }
    });
</script>

@endsection
</body>
</html>
