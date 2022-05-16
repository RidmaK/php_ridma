@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        {{ __('Create Sales Representatives') }}
                        <a href="{{route('sales-reps.index')}}" class="btn btn-primary float-end">
                            {{ __('Back to List') }}
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('sales-reps.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap mt-3">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Sales Representative Name') }}:
                                </label>

                                <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="flex flex-wrap mt-3">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Email') }}:
                                </label>

                                <input id="email" type="email" class="form-input w-full @error('email')  border-red-500 @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('name')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="flex flex-wrap mt-3">
                                <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Telephone') }}:
                                </label>

                                <input id="telephone" type="text" class="form-input w-full @error('telephone')  border-red-500 @enderror"
                                    name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

                                @error('telephone')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="flex flex-wrap mt-3">
                                <label for="joined_date" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Joined Date') }}:
                                </label>

                                <input type="date" max="{{date('Y-m-d')}}" id="joined_date" name="joined_date"
                                 class="form-input w-full @error('joined_date')  border-red-500 @enderror"
                                   required autocomplete="joined_date" autofocus  value="{{ old('joined_date') }}">
                                @error('joined_date')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <label for="route_id" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Current Route') }}:
                            </label>

                            <select id='route_id'  class="select2 form-control-sm" name='route_id' style="width: 100%"  required>
                                @foreach ($routes as $route)
                                <option  value="{{ $route->id }}">
                                    {{ $route->name }}
                                </option>
                                @endforeach

                              </select>
                            <div class="flex flex-wrap mt-3">
                                <label for="Comments" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Comments') }}:
                                </label>
                                <textarea
                                   class="
                                     form-control
                                     block
                                     w-full
                                     px-3
                                     py-1.5
                                     text-base
                                     font-normal
                                     text-gray-700
                                     bg-white bg-clip-padding
                                     border border-solid border-gray-300
                                     rounded
                                     transition
                                     ease-in-out
                                     m-0
                                     focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                   "
                                   id="comments"
                                   name="comments"
                                   rows="3"
                                   placeholder="Comments"
                                 ></textarea>
                                @error('comments')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary float-end mt-2">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
         $("#route_id").select2({
                    closeOnSelect:false,
                    theme: "classic"
         });

   });
</script>
@endsection
