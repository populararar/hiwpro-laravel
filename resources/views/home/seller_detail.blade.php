@extends('layouts.hiwpro')

@section('content')
{{dd($reviews, $avgData, $avgData->seller->name)}}
@endsection