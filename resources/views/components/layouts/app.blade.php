<!doctype html>
<html lang="{{str_replace('_','-',app()->getLocale())}}" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
    <title>{{$title ?? 'Page title'}}</title>
</head>
<body>
{{$slot}}
@livewireScripts
</body>
</html>
