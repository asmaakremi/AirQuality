@extends("layout.app")

@section("content")
<div>
            <h1 class="md:text-7xl text-5xl font-bold text-center">AIR QUALITY</h1>
        </div>
        <div class="flex flex-col items-center justify-center bg-slate-900/75 m-14 md:w-2/5 rounded-3xl">
            <h1 class="font-bold text-xl text-white	bg-slate-900 m-3 w-70 text-center p-2 rounded-3xl">Now <strong> {{$timeNow}} </strong>    In <strong>{{$location}} </strong></h1>
            <div class="flex flex-col md:flex-row m-2">
                <div class="flex flex-row">
                    <ion-icon name="thermometer-outline" class="font-semibold text-2xl text-white pt-1 "></ion-icon>
                    <h1 class="font-semibold text-2xl text-white px-5 text-center">Temperature : </h1>
                </div>
                <h2 class="text-white font-semibold text-2xl px-5 text-center">{{$temperature}}</h2>
            </div>
            <div class="flex flex-col md:flex-row m-2">
                <div class="flex flex-row">
                    <ion-icon name="cloud-outline" class="font-semibold text-2xl text-white pt-1 "></ion-icon>
                    <h1 class="text-white font-semibold text-2xl px-5 text-center">Humidity : </h1>
                </div>
                <h2 class="text-white font-semibold text-2xl px-5 text-center">{{$humidity}}</h2>
            </div>
        </div>
@endsection