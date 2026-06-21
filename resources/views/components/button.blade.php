<div>
     <button {{ $attributes->merge([
        'type'=>'submit',
        'class'=>'btn btn-outline-warning'
     ]) }}>{{ $slot }}</button>
</div>