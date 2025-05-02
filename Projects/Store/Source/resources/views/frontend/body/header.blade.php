@php
$seo = App\Models\Seo::find(1);
@endphp

<link rel="shortcut icon" href="{{ (!empty($seo->meta_icon)) ? asset('frontend/upload/website/'.$seo->meta_icon) : asset('frontend/upload/no_image.jpg') }}">