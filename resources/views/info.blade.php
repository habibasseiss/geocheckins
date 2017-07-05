@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">General information</div>

                <div class="panel-body">

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
