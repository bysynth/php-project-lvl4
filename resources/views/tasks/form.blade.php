{{ Form::bsText('name', __('forms.name')) }}
{{ Form::bsTextarea('description', __('forms.description')) }}
{{ Form::bsSelect('status_id', __('forms.status'), $taskStatusesFormData, null, ['placeholder' => '----------']) }}
{{ Form::bsSelect('assigned_to_id', __('forms.executor'), $usersFormData, null, ['placeholder' => '----------']) }}
{{ Form::bsSelect('labels[]', __('forms.labels'), $labelsFormData, null, ['placeholder' => '', 'multiple' => true]) }}
