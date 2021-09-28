 {{--  @if ($errors->any())  --}}
@foreach ($errors->all() as $error)
                @if ($errors)
                {{--  <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>
                        {{ $error }}
                    </strong>
                </div>  --}}
                <div class="alert-custom-danger alert alert-dismissible fade show">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>{{ $error }} </strong>
                </div>
           
                @endif
            @endforeach