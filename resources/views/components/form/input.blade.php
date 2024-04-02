
<div class="mb-3" {{ $validationclass ?? '' }}>
    <label class="form-label" for="{{ $id }}">{{ $titulo }}</label>
    <input type="{{ $tipo }}" class="form-control form-control-lg" name="{{ $id }}" id="{{ $id }}" placeholder="{{$holder}}" required="{{ $required ?? 'false' }}" {{ $options ?? '' }} {{ ($tipo == 'password')? 'minlength="8"': ''}}>
    <span class="invalid-feedback">{{ $error ?? 'Campo obligatorio.'}}</span>
</div>
