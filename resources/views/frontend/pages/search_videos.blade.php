@forelse ($data as $item)
    {{-- @dd($item->sponsers) --}}
    <div class="col-md-6 col-lg-4">
        <div class="video-box-main">
            <div class="video-box">
                <iframe src="{{ $item->video_link }}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="video-bottom-text">
                <a class="video-title"
                    >{{ $item->video_title }}

                </a>
                <div>
                    <p>55 mins</p>
                    <span class="fas fa-star"></span>
                    <span class="fas fa-star"></span>
                    <span class="fas fa-star"></span>
                    <span class="fas fa-star"></span>
                    <span class="fas fa-star"></span>
                </div>
            </div>
            <div class="video-bottom-description">
                <h5>02/17/2022</h5>
                <p><span>Presented by:</span> {{ $item->presented_by }}<br />
                    <strong>Sponsored by:</strong>
                    @forelse ($item->sponsers as $sponsor)
                    {{-- @dd($sponsor) --}}
                        <p>{{ $sponsor->sponser_name }}</p>
                    @empty
                        <p>No Sponsors found</p>
                    @endforelse
                </p>
                <p class="para-decription">
                    {{ $item->video_description }}
                </p>
                <a href="{{ route('video_desc', [$item->id, $item->category_id]) }}">Read More</a>
            </div>
        </div>
    </div>
@empty
    <div class="d-flex justify-content-center align-items-center">
        <h5>No data found</h5>
    </div>
@endforelse
