@extends('landing.layout')

@section('content')
    @php
        /** @var \App\NewsItem $newsItem */
        $i = 0;
    @endphp

    <div class="row">
    @forelse ($newsItems as $newsItem)
        <div class="col-sm-12 col-md-8 col-md-offset-2 news-items wow {{ (($i%2) == 0) ? 'bounceInRight' : 'bounceInLeft' }}"
             data-wow-duration="2s">
            <article>
                <h1 class="mb-20">{{ $newsItem->title }}</h1>

                <div class="article-meta">
                    <span>
                        <i class="fa fa-user"></i> {{ trans('landing.news.author') }}:
                        {{ $newsItem->author }}
                    </span>
                    <span>
                        <i class="fa fa-clock-o"></i> {{ trans('landing.news.publishedAt') }}:
                        {{ \App\Classes\FormatterHelper::dateTimeFormat($newsItem->published_at) }}
                    </span>
                </div>

                <div class="article-description text-justify">
                    <img src="{{ $newsItem->filename ?? '/assets/imgs/default_article_image.png' }}" alt="{{ $newsItem->title }}">

                    {!! $newsItem->description !!}
                </div>
            </article>
            <hr class="article-divider">
        </div>
        @php $i++ @endphp
    @empty
        <div class="alert alert-warning text-center">
            {{ trans('landing.news.noEntries') }}
        </div>
    @endforelse
    </div>

@endsection

@section('footer-scripts')
    <script>
        $(document).ready(function () {
            $('div.article-description > p > a').on('click', function (e) {
                e.preventDefault();
                window.open(this.href, '_blank');
            })
        })
    </script>
@endsection