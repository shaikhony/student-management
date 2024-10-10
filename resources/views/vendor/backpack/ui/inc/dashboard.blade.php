@section('content')
    <div class="container">
        <div class="row">
            @foreach (Widget::get() as $widget)
                <div class="col-md-6 col-lg-4 mb-4"> <!-- عرض 3 widgets في الصف -->
                    @if ($widget['type'] === 'progress')
                        <div class="{{ $widget['class'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $widget['description'] }}</h5>
                                <p class="card-text">{{ $widget['value'] }}</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $widget['progress'] }}%;" aria-valuenow="{{ $widget['progress'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>{!! $widget['hint'] !!}</small>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection