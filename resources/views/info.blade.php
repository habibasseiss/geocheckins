@extends('layouts.app')

@section('title', 'General information')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <table class="table">
            <thead>
                <th>Table</th>
                <th># of records</th>
            </thead>
            <tbody>
                <td><code>venues</code></td>
                <td>{{ $venues_count }}</td>
            </tbody>
        </table>
    </div>
@endsection
