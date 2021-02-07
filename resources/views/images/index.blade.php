@extends('layouts.app')

@section('content')
    <div class=container>
        <div class=waterfall> </div>
    </div>
@endsection

@section('js')
    <script>
        $('.waterfall').data('bootstrap-waterfall-template', $('#waterfall-template').html())
            .on('finishing.mystist.waterfall', function () {
                setTimeout(function () { // simulate ajax
                    $('.waterfall').data('mystist.waterfall').addPins($($('#another-template').html()))
                }, 2000);
            })
            .waterfall()
    </script>
@endsection
