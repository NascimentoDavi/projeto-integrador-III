@extends('layouts.app')

@section('title', 'menu')

@section('content')


    <div class="content" id="content">
        <p>{{auth()->user()}}</p>
    </div>


</body>
</html>

@endsection()
