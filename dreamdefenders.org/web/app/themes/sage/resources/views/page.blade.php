@extends('layouts.app')

@section('hero')
  @isnotnull($data->hero->heading)
    @include('components.call-to-action',
      array('data' => (object) $data->hero))
  @endisnotnull
@endsection

@section('content')
  @posts @include('partials.content-page') @endposts
@endsection

@section('call-to-action-primary')
  @isnotnull($data->newsletter->heading)
    @include('components.newsletter',
      array('data' => (object) $data->newsletter))
  @endisnotnull
@endsection

@section('call-to-action-secondary'))
  @isnotnull($data->donation_cta->heading)
    @include('components.donation',
      array('data' => (object) $data->donation_cta))
  @endisnotnull
@endsection

@section('social')
  @shortcode('[instagram-feed]')
@endsection
