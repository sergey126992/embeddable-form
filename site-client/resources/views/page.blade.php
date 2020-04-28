@extends('layouts.main')

@section('content')
    <p style="margin: 0 0 15px 0;white-space: pre-line;">
    <div class="content">
        <h3>
            {{ $data['title']}}
        </h3>
        <p>
            {{ $data['description']}}
        </p>
        <p>
            {{ $data['content']}}
        </p>
        <p>
            Created: {{ $data['created_at']}}
        </p>
    </div>
    </p>
@endsection
