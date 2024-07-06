@extends('dashboard/layout')

@section('contents')
    <h1>
        Messages
    </h1>

    @if (count($messages) == 0)
        <h3 style="text-align: center;">
            no messages now
        </h3>
    @else
    <form action="{{ route('messages.delete') }}" id="multiRouteForm" method="POST">
        @csrf
    <table class="table table-striped table-bordered" style="margin: 0 auto; width: 55%;">
        <tr>
            <th>
                <input type="checkbox" id="mainCheckbox">
            </th>
            <th>Guest Name</th>
            <th>Subject</th>
            <th>ops</th>
        </tr>
        @foreach ($messages as $item)
            <tr 
                @if ($item->isRead == false)
                    style="background-color: red;"
                @endif            
            >
                <th>
                    <input type="checkbox" name="messages[]" value="{{$item->id}}">
                </th>
                
                <td>{{$item->guestName}}</td>
                <td>{{$item->subject}}</td>
                <td>
                    operations
                </td>
            </tr>
        @endforeach
    </table>

    <button class="btn btn-danger" value="Delete">Delete Selected</button>
    &nbsp; &nbsp; &nbsp; 
    <button class="btn btn-info" value="Read">Mark as Read</button>
    &nbsp; &nbsp; &nbsp; 
    <button class="btn btn-success" value="UnRead">Mark as UnRead</button>
    &nbsp; &nbsp; &nbsp; 

    </form>
    @endif
    

    <script>
        document.getElementById('multiRouteForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var action = e.submitter.value;
            switch(action) {
                case 'Delete':
                    this.action = "{{ route('messages.delete') }}";
                    break;
                case 'Read':
                    this.action = "{{ route('messages.read') }}";
                    break;
                case 'UnRead':
                    this.action = "{{ route('messages.unread') }}";
                    break;
            }
            this.submit();
        });


        /* ------------------------------------ */

        const mainCheckbox = document.getElementById('mainCheckbox');
        const formCheckboxes = document.querySelectorAll('#multiRouteForm input[type="checkbox"]');

        mainCheckbox.addEventListener('change', function() {
            formCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
@endsection