@php
$seo = App\Models\Seo::find(1);
@endphp


<!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->


    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Author Meta -->
    <meta name="author" content="{{ $seo-> meta_author }}">
    <!-- Meta Description -->
    <meta name="description" content="{{ $seo-> meta_description }}">
    <!-- Meta Keyword -->
    <meta name="keywords" content="{{ $seo-> meta_keyword }}">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->