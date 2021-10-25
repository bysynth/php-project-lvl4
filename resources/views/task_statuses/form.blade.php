<div class="form-group">
    {{ Form::label('name', __('interface.task_statuses.create.fields.name')) }}
    {{ Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) }}
    @error('name')
        <div class="invalid-feedback"> {{ $message }}</div>
    @enderror
</div>
