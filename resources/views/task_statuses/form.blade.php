<div class="form-group">
    {{ Form::label('name', __('views.task_statuses.form.fields.name')) }}
    {{ Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) }}
    @error('name')
        <div class="invalid-feedback"> {{ $message }}</div>
    @enderror
</div>
