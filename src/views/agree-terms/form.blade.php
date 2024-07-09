<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            @include('agree-terms.terms')
            <form action="{{ route(config('agree-terms.store_route')) }}" method="post">
                @csrf
                <div class="form-check">
                    <input name="is_agreed" type="checkbox" class="form-check-input" id="is_agreed">
                    <label class="form-check-label" for="is_agreed">Terms and Conditions</label>
                    @error('is_agreed')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
