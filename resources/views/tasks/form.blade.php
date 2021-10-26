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
    {{ Form::select('status_id', $taskStatuses, null, ['placeholder' => '----------', 'class' => 'form-control']) }}
    @error('status_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('assigned_to_id', __('views.tasks.form.fields.executor')) }}
    {{ Form::select('assigned_to_id', $users, null, ['placeholder' => '----------', 'class' => 'form-control']) }}
</div>
{{-- TODO Добавить форму для меток --}}
{{--<div class="form-group">--}}
{{--    <label for="labels">__('views.tasks.form.fields.labels')</label>--}}
{{--    <select class="form-control" multiple name="labels[]">--}}
{{--        <option value=""></option>--}}
{{--    </select>--}}
{{--</div>--}}
