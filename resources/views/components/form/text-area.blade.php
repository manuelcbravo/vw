<div class="mb-3">
    <label class="form-label" for="{{ $id }}">{{ $titulo }}</label>
    <textarea class="form-control" rows="4" name="{{ $id }}" id="{{ $id }}" placeholder="{{$holder}}" required="{{ $required ?? 'false' }}"></textarea>
    <span class="invalid-feedback">{{ $error ?? 'Campo obligatorio.'}}</span>
</div>