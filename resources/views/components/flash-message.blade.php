 @php
 if ($type == 'error') {
     $typeClass = ' alert-danger';
 }
 if ($type == 'success') {
     $typeClass = ' alert-success';
 }
@endphp

@if(session()->has($key))
 <div {{ $attributes->merge(['class' => 'alert alert-dismissible fade show'.$typeClass]) }} role="alert" style="position: absolute; display: inline-flex; width: 450px; padding: 4px; margin: 2px 0 0 15px;">


     @if ($type == 'success')
         <svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Success:" style="margin: 4px;"><use xlink:href="#check-circle-fill"/></svg>
     @endif

     @if ($type == 'error')
         <svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:" style="margin: 4px;"><use xlink:href="#exclamation-triangle-fill"/></svg>
     @endif
     <strong>
         {{ session()->get($key) }}
     </strong>
     <button style="outline: none; font-size: 10px; font-weight: bold; padding: 10px;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif

