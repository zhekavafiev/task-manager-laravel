@extends('layouts.app')

@section('content')
    <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="column">Text</th>
                        <th scope="column">Color</th>
                        <th scope="column">Color text</th>
                        <th scope="column">Option</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($labels as $label)
                        <tr>
                            <td>{{$label['text']}}</td>
                            <td>{{$label['textColor']}}</td>
                            <td>{{$label['color']}}</td>
                            <td>
                                <a href="{{ route('labels.destroy', $label['id']) }}" data-confirm="Are you sure?" data-method="delete">Delete</a>
{{--                                <a href="{{ route('labels.update', $label['id']) }}" data-confirm="Are you sure?" data-method="PATCH">Update</a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

