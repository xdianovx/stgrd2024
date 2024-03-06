@php
    $hero__data = [ 'text_left' => 'Строим больше 20 лет']
@endphp

@extends('layouts.main')

@section('content')
  <main data-barba="container" data-barba-namespace="home">
    <x-section.hero :data="$hero__data"/>
    <x-section.video/>
    <x-section.mission/>
    <x-section.projects/>
    <x-section.offers_slider/>
    <x-section.marquee/>
    <x-section.features />
    <x-section.life/>
    <x-section.connect/>
  </main>
@endsection
