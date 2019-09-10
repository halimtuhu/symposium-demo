@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <h3>Available Events</h3>
        </div>
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold">Music Festival</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae, reiciendis! Inventore atque ab architecto quas minima, necessitatibus eaque. Modi sequi praesentium laborum unde qui soluta, provident perspiciatis nostrum iusto molestias.</p>
                    <div class="text-right"><a href="{{ route('pay', ['ticket' => 'Music Festival', 'price' => 35000]) }}" class="btn btn-primary" target="_blank">Rp. 35.000 ,-</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold">Food Festival</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae, reiciendis! Inventore atque ab architecto quas minima, necessitatibus eaque. Modi sequi praesentium laborum unde qui soluta, provident perspiciatis nostrum iusto molestias.</p>
                    <div class="text-right"><a href="{{ route('pay', ['ticket' => 'Food Festival', 'price' => 30000]) }}" class="btn btn-primary" target="_blank">Rp. 30.000 ,-</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
