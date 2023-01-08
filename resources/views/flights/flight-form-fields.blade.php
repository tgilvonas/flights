<div>
    @if(isset($errors) && count($errors))
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    @csrf
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">{{ __('general.status') }}</label>
        <div class="col-md-10">
            <select name="status_id" class="form-control">
                <option value="">{{ __('general.select') }}</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" @if($status->id==old('status_id', $flight->status_id)) selected @endif >
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">{{ __('general.airport_from') }}</label>
        <div class="col-md-10">
            <select name="airport_from" class="form-control">
                <option value="">{{ __('general.select') }}</option>
                @foreach($airports as $airport)
                    <option value="{{ $airport->id }}" @if($airport->id==old('airport_from', $flight->airport_from)) selected @endif >
                        {{ $airport->name }}, {{ $airport->country }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">{{ __('general.departure_time') }}</label>
        <div class="col-md-10">
            <input type="datetime-local" name="departure_time" value="{{ old('departure_time', $flight->departure_time) }}" class="form-control" />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">{{ __('general.departure_timezone') }}</label>
        <div class="col-md-10">
            <select name="departure_timezone" class="form-control">
                <option value="">{{ __('general.select') }}</option>
                @foreach($timezones as $timezone)
                    <option value="{{ $timezone->id }}" @if($timezone->id==old('departure_timezone', $flight->departure_timezone)) selected @endif >
                        {{ $timezone->name2 }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">{{ __('general.airport_to') }}</label>
        <div class="col-md-10">
            <select name="airport_to" class="form-control">
                <option value="">{{ __('general.select') }}</option>
                @foreach($airports as $airport)
                    <option value="{{ $airport->id }}" @if($airport->id==old('airport_to', $flight->airport_to)) selected @endif >
                        {{ $airport->name }}, {{ $airport->country }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">{{ __('general.arrival_time') }}</label>
        <div class="col-md-10">
            <input type="datetime-local" name="arrival_time" value="{{ old('arrival_time', $flight->arrival_time) }}" class="form-control" />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">{{ __('general.arrival_timezone') }}</label>
        <div class="col-md-10">
            <select name="arrival_timezone" class="form-control">
                <option value="">{{ __('general.select') }}</option>
                @foreach($timezones as $timezone)
                    <option value="{{ $timezone->id }}" @if($timezone->id==old('arrival_timezone', $flight->arrival_timezone)) selected @endif >
                        {{ $timezone->name2 }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">{{ __('general.passengers') }}</label>
        <div class="col-md-10">
            <input type="number" min="0" max="500" step="1" name="passengers" value="{{ old('passengers', $flight->passengers) }}" class="form-control" />
        </div>
    </div>
    <div class="text-end mt-3 mb-3">
        <a href="{{ route('flights.index') }}" class="btn btn-warning">{{ __('general.cancel') }}</a>
        <button class="btn btn-primary" type="submit">{{ __('general.save') }}</button>
    </div>
</div>
