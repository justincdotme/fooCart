@extends('public.layouts.main')

@section('title')
    @parent Search Results
@stop

@section('content')
    <div class="container">
        <div class="row row-top-buffer">
            <div class="col-sm-12">
                @if(!$results->isEmpty())
                    <h1>Search results for "{{ $query }}"</h1>
                @else
                    <h1>No search results for "{{ $query }}"</h1>
                @endif
            </div>
        </div>
        <div class="row row-top-buffer">
            <div class="col-sm-12">
                @foreach($results as $result)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="/products/{{ $result->product_id }}">
                                <h3 class="panel-title">{{ $result->name }}</h3>
                            </a>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-2">
                                <div class="thumbnail">
                                    <a href="/products/{{ $result->product_id }}">
                                        <img class="inline" src="{{ (count($result->images)) ? $result->images->first()->image_path : 'http://placehold.it/221x221' }}" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <a href="/products/{{ $result->product_id }}">
                                    <h2>{{ $result->name }}</h2>
                                    <h3>{{ $result->manufacturer->manufacturer }}</h3>
                                    <p>
                                        {{ $result->short_desc }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row row-top-buffer">
            <div class="col-sm-12">
                @if(!$results->isEmpty())
                    {!! $results->appends(['query' => $query])->render() !!}
                @endif
            </div>
        </div>
    </div>
@stop