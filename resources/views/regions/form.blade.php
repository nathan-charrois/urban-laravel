@inject('countries', 'App\Http\Utilities\Country')
{{ csrf_field() }}

<fieldset>
	<div class="row">
        <div class="column">
            <h3 class="heading-section">Location</h3>
        </div>
    </div>
	<div class="row">
		<div class="input-container">			
			<div class="small-12 medium-4 large-3 columns">
				<label for="street">Street:</label>
			</div>
			<div class="small-12 medium-8 large-6 columns end">
				<input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="input-container">			
			<div class="small-12 medium-4 large-3 columns">
				<label for="city">City:</label>
			</div>
			<div class="small-12 medium-8 large-6 columns end">
				<input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="input-container">			
			<div class="small-12 medium-4 large-3 columns">
				<label for="zip">Zip:</label>
				<span class="label-subtext">or Postal Code</span>
			</div>
			<div class="small-12 medium-4 large-2 columns end">
				<input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="input-container">			
			<div class="small-12 medium-4 large-3 columns">
				<label for="country">Country:</label>
			</div>
			<div class="small-12 medium-8 large-6 columns end">
				<div class="select-container">
	                <select id="country" name="country">
	                    @foreach ($countries::all() as $name => $code)
							<option value="{{ $code }}">{{ $name }}</option>
						@endforeach
	                </select>
	                <div class="select-text"></div>
	                <div class="select-caret">
	                    <i class="fa fa-caret-down"></i>
	                </div>
	            </div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="input-container">			
			<div class="small-12 medium-4 large-3 columns">
				<label for="state">State:</label>
			</div>
			<div class="small-12 medium-8 large-6 columns end">
				<input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="input-container">			
			<div class="small-12 medium-4 large-3 columns">
				<label for="price">Price:</label>
			</div>
			<div class="small-12 medium-8 large-2 columns end">
				<input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
				<div class="row">
                    <div class="small-12 medium-12 large-12 columns">
                        <div class="checkbox-container mtl">
                            <input type="hidden" value="0" data-input="make-email-public" name="make-email-public">
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset>
	<div class="row">
        <div class="column">
            <h3 class="heading-section">About Me</h3>
        </div>
    </div>
	<div class="row">
		<div class="column">
			<div class="textarea-editor">
            <textarea rows="5" name="description" class="textarea-editor-body">{{ old('description') }}</textarea>
            <div class="textarea-editor-tools">
                <ul class="tools clearfix">
                    <li class="tool disabled">
                        <i class="fa fa-bold"></i>
                    </li>
                    <li class="tool disabled">
                        <i class="fa fa-italic"></i>
                    </li>
                    <li class="tool disabled">
                        <i class="fa fa-list-ul"></i>
                    </li>
                </ul>
            </div>
        </div>
		</div>
	</div>
</fieldset>
<div class="row">
    <div class="small-12 medium-offset-8 medium-4 large-offset-10 large-2 columns">
        <button class="large-12 fill button button-primary" id="submit">
            Save
		</button>
    </div>
</div>