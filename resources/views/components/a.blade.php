@props(['href'])

<a {{$attributes}} class="link link-primary link-hover" href="{{$href}}">
    {{$slot}}
</a>
