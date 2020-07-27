@extends('layouts.app')

@section('content')

<!-- Языковые изменения не вводил, потому что страница только для административного доступа
Соответственно администратор может и на английском рулить) -->
    <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="column">Id</th>
                        <th scope="column">Text</th>
                        <th scope="column">Color</th>
                        <th scope="column">Color text</th>
                        <th scope="column">Option</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($labels as $label)
                        <tr>
                            <th scope="row">{{ $label->id }}</th>
                            <td>{{$label->text}}</td>
                            <td>{{$label->color}}</td>
                            <td>{{$label->text_color}}</td>
                            <td>
                                <a href="{{ route('labels.adminDestroy', $label) }}" data-confirm="Are you sure?" data-method="delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

