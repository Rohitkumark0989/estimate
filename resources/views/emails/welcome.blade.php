@component('mail::message')
Dear {{$details['name']}}, {{$details['title']}}

{{$details['message']}}
{{$details['password']}}
{{$details['attachement']}}
@if($details['link'] !='')
    Click Here {{ url($details['link']) }}
@endif

Thanks,
{{ config('app.name') }}
@endcomponent
