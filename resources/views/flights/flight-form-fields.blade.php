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
    <div class="text-end mt-3 mb-3">
        <a href="{{ route('flights.index') }}" class="btn btn-warning">{{ __('general.cancel') }}</a>
        <button class="btn btn-primary" type="submit">{{ __('general.save') }}</button>
    </div>
</div>
