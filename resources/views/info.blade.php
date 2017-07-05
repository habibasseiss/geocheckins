@extends('layouts.app')

@section('title', 'General information')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <table class="table">
            <thead>
                <tr>
                    <th>Table</th>
                    <th># of records</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>venues</code></td>
                    <td>{{ $venues_count }}</td>
                </tr>
                <tr>
                    <td><code>customers</code></td>
                    <td>{{ $customers_count }}</td>
                </tr>
                <tr>
                    <td><code>ratings</code></td>
                    <td>{{ $ratings_count }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
