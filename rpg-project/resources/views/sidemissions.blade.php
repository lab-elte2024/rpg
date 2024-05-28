@extends('layouts.layout')

@section('title', 'Mellék küldetések')

@section('content')
    <ul class="mission-list">
        @foreach ($missions as $mission)
            <li>
                <form method="POST" action="sorting">
                    @csrf
                    <input type="hidden" name="missionID" value="{{ $mission->id }}">
                    {{ $mission->description }}
                    <input type="submit" value="{{ $mission->name }}">
                </form>
            </li>
        @endforeach
    </ul>
@endsection
