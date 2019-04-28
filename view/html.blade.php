<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        ul,li {
            list-style: none;
        }
    </style>
</head>
<body>
@foreach($collection as $item)
    <h3><a href="{{ $item['url'] }}">{{ $item['title'] }}</a></h3>
@if($item['children'] ?? false)
    <ul>
    @foreach($item['children'] as $child)
        <li><a href="{{ $child['url'] }}">{{ $child['title'] }}</a>
        @isset($child['updated_at'])
            <small>(last updated: {{ $child['updated_at'] ?? '' }})</small>
        @endisset
        </li>
    @endforeach
    </ul>
@endif
@endforeach
</body>
</html>