<div class="col-lg-7 col-xl-9 h100-scroll bg-body-dark">
    <!-- Main Content -->
    <div class="content">
        @if($hotels)
        <div class="row">
            @foreach($hotels as $hotel)

            <div class="col-md-6 col-xl-4">
                <!-- House -->
                <div class="block block-rounded block-fx-pop">
                    <div class="block-content p-0 overflow-hidden">
                        <a class="img-link img-fluid-100" data-toggle="layout" href="javascript:void(0)">
                            <img class="img-fluid rounded-top" src="{{ $hotel->images->first()->path }}" alt="">
                        </a>
                    </div>
                    <div class="block-content">
                        <h4 class="h6 mb-2">{{ $hotel->name }}</h4>
                        @if($hotel->rooms->first())
                        <h5 class="h2 font-w300 push">${{ $hotel->rooms->first()->price }} <span class="font-size-h3 text-muted">{{ __('per night') }}</span></h5>
                        @else
                        <h5 class="h2 font-w300 push">{{ __('There is no available rooms') }}</h5>
                        @endif
                    </div>
                    <div class="block-content p-0">
                        <div class="row text-center m-0 border-top border-bottom bg-body-light">
                            <div class="col-12 border-right">
                                <p class="py-3 mb-0">
                                    <i class="fa fa-fw fa-map-marker text-muted mr-1"></i>
                                    {{ $hotel->city->name }}, {{ $hotel->address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @if($hotel->rooms->first())
                    <div class="block-content p-0">
                        <div class="row text-center m-0 border-top border-bottom bg-body-light">
                            <div class="col-12 border-right">
                                <p class="py-3 mb-0">
                                    <i class="fa fa-fw fa-bed text-muted mr-1"></i>
                                    {{ __('Available rooms') }} : {{ count($hotel->rooms) }} <br>
                                </p>
                                <button type="button" class="btn btn-sm btn-hero btn-noborder btn-primary btn-block mb-3" data-toggle="modal" data-target="#modalHotel{{ $hotel->id }}">{{ __('See rooms info') }}</button>
                                <div class="modal fade" id="modalHotel{{ $hotel->id }}" role="dialog">
                                    <div class="modal-dialog modal-m">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                @foreach($hotel->rooms as $room)
                                                    <p class="mb-3">
                                                    {{ __('Room Size') }}:{{ $room->room_size }},<br>
                                                    {{ __('Price') }}: ${{ $room->price }} {{ __('per night') }},<br>
                                                    {{ __('Description') }}: {{ $room->short_description }}<br>
                                                    </p>
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="block-content block-content-full">
                        <p>{{ $hotel->short_description }}</p>
                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-sm btn-hero btn-noborder btn-secondary btn-block" data-toggle="layout" href="javascript:void(0)">
                                    View
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-sm btn-hero btn-noborder btn-primary btn-block" href="javascript:void(0)">
                                    Rent
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END House -->
            </div>

            @endforeach
        </div>
        {{ $hotels->links() }}
        @else
            <p>{{ __('Sorry, Nothing Found') }}</p>
        @endif
    </div>
    <!-- END Main Content -->
</div>