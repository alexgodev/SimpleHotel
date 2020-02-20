<div class="col-lg-5 col-xl-3 h100-scroll">
    <div class="content">
        <a class="btn btn-hero-success mb-3" href="/"><i class="fa fa-home mr-1"></i> {{ __('Home') }}</a>
        <!-- Search Travel -->
        <form class="push" action="{{ route('hotelSearch') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <input type="text" class="form-control form-control-lg font-size-base border-2x text-center" id="term" name="term" placeholder="{{ __('Where are you going? Type hotel, city, keyword...') }}" value="{{ $input['term'] ?? '' }}" required>
            </div>
            <div class="form-group">
                <div class="input-daterange input-group input-group-lg" data-date-format="mm/dd/yyyy" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                    <input type="text" class="form-control border-right-0 border-2x font-size-base" id="check_in" name="check_in" placeholder="Arriving.." data-week-start="1" data-autoclose="true" data-today-highlight="true" value="{{ $input['check_in'] ?? '' }}">
                    <div class="input-group-prepend input-group-append">
                        <span class="input-group-text bg-white border-2x border-left-0 border-right-0 font-w600">
                            <i class="fa fa-fw fa-angle-double-right font-size-base text-muted"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control border-left-0 border-2x font-size-base" id="check_out" name="check_out" placeholder="Leaving.." data-week-start="1" data-autoclose="true" data-today-highlight="true" value="{{ $input['check_out'] ?? '' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-hero-primary">
                        <i class="fa fa-search mr-1"></i> {{ __('Search') }}
                    </button>
                </div>
            </div>
        </form>
        <!-- END Search Travel -->
    </div>
</div>