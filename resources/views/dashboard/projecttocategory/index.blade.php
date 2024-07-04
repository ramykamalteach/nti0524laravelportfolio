@extends('dashboard/layout')

@section('contents')
    <h1>
        project to category index
    </h1>

    @if (count($pToCs) == 0)
        <h3>No projects assigned to categories yet !!!</h3>
    @else
        <div>
            <table class="table table-striped table-bordered" style="margin: 0 auto; width: 55%;">
                <tr>
                    <th>Project title</th>
                    <th>Category name</th>
                </tr>
                @foreach ($pToCs as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->categoryName}}</td>
                    </tr>                
                @endforeach
            </table>
        </div>
        
    @endif

    <form action="{{ route('storeprojecttocategory') }}" method="POST">
        @csrf
        @method('post')

        <select class="form-select mb-3" name="projectId" id="">
            @foreach ($projects as $oneProject)
                <option value="{{$oneProject->id}}">{{$oneProject->title}}</option>
            @endforeach
        </select>

        <select class="form-select mb-3" name="categoryId" id="">
            @foreach ($categories as $oneCategory)
                <option value="{{$oneCategory->id}}">{{$oneCategory->categoryName}}</option>
            @endforeach
        </select>

        <button class="btn btn-success">Assign Project to A category</button>
    </form>
@endsection