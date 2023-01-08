<div>
    @if(isset($errors) && count($errors))
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    @csrf
    <div class="text-end mt-3 mb-3">
        <a href="{{ route('flights.index') }}" class="btn btn-warning">{{ __('general.cancel') }}</a>
        <button class="btn btn-primary" type="submit">{{ __('general.save') }}</button>
    </div>
</div>
