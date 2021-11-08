{{ Form::bsText('name', __('forms.name')) }}
{{ Form::bsTextarea('description', __('forms.description')) }}
{{ Form::bsSelect('status_id', __('forms.status'), $taskStatuses, null, ['placeholder' => '----------']) }}
{{ Form::bsSelect('assigned_to_id', __('forms.executor'), $users, null, ['placeholder' => '----------']) }}
{{ Form::bsSelect('labels[]', __('forms.labels'), $labels, null, ['placeholder' => '', 'multiple' => true]) }}
