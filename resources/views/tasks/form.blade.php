<div class="form-group">
    {{ Form::label('name', __('views.tasks.form.fields.name')) }}
    {{ Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) }}
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('description', __('views.tasks.form.fields.desc')) }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('status_id', __('views.tasks.form.fields.status')) }}
    {{ Form::select('status_id', $taskStatuses, null, ['placeholder' => '----------', 'class' => $errors->has('status_id') ? 'form-control is-invalid' : 'form-control']) }}
    @error('status_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('assigned_to_id', __('views.tasks.form.fields.executor')) }}
    {{ Form::select('assigned_to_id', $users, null, ['placeholder' => '----------', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('labels', __('views.tasks.form.fields.labels')) }}
    {{ Form::select('labels[]', $labels, null, ['placeholder' => '', 'class' => 'form-control', 'multiple' => true]) }}
</div>
