<!-- resources/views/faq/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  <faq-accordion></faq-accordion>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
