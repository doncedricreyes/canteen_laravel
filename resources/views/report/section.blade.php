@include('layouts.navbar')


@livewire('customer-section',['level'=>$customers->level,'section'=>$customers->section])