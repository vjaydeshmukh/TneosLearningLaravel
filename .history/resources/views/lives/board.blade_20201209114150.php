@extends('layouts.app')

@section('page_title', 'Online Live Classes Videos')

@section('content')
<style>
.dot {
    height: 50px;
    width: 50px;
    background-color: #bbb;
    border-radius: 50%;
    line-height: 4em;
    display: inline-block;
  }
  </style>
    <div class="container mt-5 pt-0 mb-5 pb-5">
{{--        @if($cat_live)--}}
{{--            <h2>{{ Str::title(str_replace('-', ' ', $cat_live[0]['category_id'])) }}</h2>--}}
{{--        @endif--}}

        <div class="row mb-4">
            <div class="col">
                <span class="display-4 font-weight-bold featured-live-heading">Live Videos &nbsp; <img src="https://img.icons8.com/color/48/000000/youtube-live.png"/></span>
            </div>
        </div>


        <div class="d-flex flex-wrap justify-content-center">
            @if (count($lives) === 0)
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_rc6CDU.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
            @endif
            @foreach($lives as $life)
                <div class="p-2">
                        <div class="card life-card mb-4 shadow-lg" style="width: 12.5rem;">
                                <a href="/lives/{{ $life->slug }}">
                            @if ($life->status === '1')
                                <div class="card-img-overlay">
                                    <span class="badge badge-danger live-badge pull-right">Live</span>
                                </div>
                            @endif
                            <img class="card-img-top"  style="height: 135px; width: 240px;"  src="{{ Voyager::image( $life->image ) }}"/>

                            <div class="card-body descripiton-card">
                                  {{-- <div class="d-flex justify-content-between text-justify p-2">
                                    <span class="badge badge-danger p-1 px-2 border border-dark">{{$life->board}}</span>
                                    <span class="badge badge-warning p-1 px-2 border border-dark">{{$life->class}}'th class</span>
                                    <span class="badge badge-info p-1 px-2 border border-dark">{{$life->subject }}</span>
                                  </div> --}}
                                  <div class="d-flex justify-content-start">
                                    <div>
                                        <svg width="50" height="50">
                                            <circle cx="25" cy="25" r="20" fill="#17A2B8"/>
                                            <text fill="#ffffff" font-size="12"  x="15" y="30">
                                            {{$life->class}}th
                                            </text>
                                        </circle>
                                        </svg>
                                    </div>
                                    <div>
                                    <div class="card-title mb-0 videotitle text-info p-1" data-toggle="tooltip" data-placement="top" title="{{$life->title}}">{{\Illuminate\Support\Str::limit($life->title, 28, $end='...')}}</div>
                                    <div class="ml-1 d-flex flex-wrap content-justify-between">
                                        <p class="p-0 m-0 mr-auto" style="font-size: 11px; color: #73726c;">{{$life->board}}</p>
                                        <p class="p-0 mx-2 m-0" style="font-size: 9px; color: #73726c;">{{$life->subject}}</p>
                                    </div>
                                    <p class="p-0 mx-2 m-0"  style="font-size: 9px; color: #73726c;">{{$life->created_at->diffForHumans()}}</p>
                                </div>
                                </div>
                                    <!--{!! Str::of($life->description)->limit(140,'(...)') !!}-->
                            </div>

                             </a>
                        </div>
                </div>
            @endforeach
            </div>
            </div>
<div class="clearfix"></div>
        {{-- {{ $cat_live->links() }} --}}
</div>
@endsection
