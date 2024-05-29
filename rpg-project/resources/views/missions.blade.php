@extends('layouts.layout')

@section('title', 'Küldetések')

@section('content')
    <ul class="mission-list">
        @foreach ($missions as $mission)
            <li>
                <form method="POST" action="sorting">
                    @csrf
                    <input type="hidden" name="missionID" value="{{ $mission->id }}"><br><br>
                    {{ $mission->description }}<br>
                    <input type="submit"  id = "btn1" value="{{ $mission->name }}">
                </form>
            </li>
        @endforeach
    </ul>
@endsection
