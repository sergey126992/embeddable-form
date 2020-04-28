@extends('layouts.main')

@section('content')
    <p style="margin: 0 0 15px 0;white-space: pre-line;">
    <div class="content">
        <p>
        @foreach ($errors->all() as $error)

            <div>{{ $error }}</div>

        @endforeach
        </p>
        <h3>
            Create Page
        </h3>
        <form method="POST" action="/store" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" required="required" name="title"/><br/>
            <input type="text" required="required"  name="content"/><br/>
            <input type="text" required="required"  name="description"/><br/>

            <button type="submit">Submit</button>
        </form>
    </div>
    </p>
@endsection
