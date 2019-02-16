@extends('layouts.app')

@section('hero')
  @isnotnull($data->hero->heading)
    @include('components.hero', [
      'data' => (object) $data->hero
    ])
  @endisnotnull
@endsection

@section('content')
  @posts @include('partials.content-page') @endposts
@endsection

@section('call-to-action-primary')
  @isnotnull($data->call_to_action->heading)
    @include('components.call-to-action', [
      'data' => (object) $data->call_to_action
    ])
  @endisnotnull
@endsection

@section('call-to-action-secondary')
  @isnotnull($data->donation_cta->heading)
    @include('components.donation', [
      'data' => (object) $data->donation_cta
    ])
  @endisnotnull
@endsection

@section('social')
  @shortcode('[instagram-feed]')
@endsection
