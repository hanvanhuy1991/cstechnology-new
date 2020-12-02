@foreach (Alert::getMessages() as $type => $messages)
    @foreach ($messages as $message)
        <div class="alert alert-{{ $type }} border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
             {{ $message }}
        </div>
    @endforeach
@endforeach
