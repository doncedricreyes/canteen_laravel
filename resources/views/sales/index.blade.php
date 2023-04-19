@extends('layouts.navbar')
@section('content')

@livewire('sale')
{{auth()->user()->name}}
@endsection