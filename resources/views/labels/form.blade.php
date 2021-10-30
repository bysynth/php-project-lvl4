<div class="form-group">
    {{ Form::label('name', __('labels.form.fields.name')) }}
    {{ Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) }}
    @error('name')
        <div class="invalid-feedback"> {{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('description', __('labels.form.fields.desc')) }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
