@extends('layout.mainForValid')

@section('forValid')
    <h1> For Validation </h1>
    <h3> или так </h3>
    <h1> {{ $title }} </h1>


{{--    Блок для вывода (в верху страницы) всех ошибок при заполнении всех полей--}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--Блок для вывода результата создания записи--}}
    @if(session('message'))
            <div class="alert alert-success">
                <strong>{{ session('message') }}</strong>
            </div>
        @endif


    {{-- тут 'forValid.sttore' это имя маршрута из файла "web.php", который будет обрабатывать данные этой формы отправленные методом "post"--}}
    <form action="{{ route('forValid.sttore') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="для поля связи с другой таблицей" class="form-label">For foreignKey</label>
            <select name="for_valid_mains_id" class="form-select" aria-label="Default select example"
                    id="для поля связи с другой таблицей">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="inputForTitle" class="form-label">For title</label>

            {{--            тут "@error('$title') is-invalid @enderror" + блок "@if ..@endif" (ниже) покажет ошибку валидаци и подсветит поле "title" красным. --}}
            {{--            А "value="{{old('$title')}}"" вернет неправильно введеное значение в поле ввода--}}
            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                   value="{{old('title')}}" id="inputForTitle" placeholder="field for title">
            @if($errors->has('title'))
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="inputForContent" class="form-label">For content</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                      value="{{old('content')}}" id="inputForContent" rows="3"
                      placeholder="field for content"></textarea>
            @if($errors->has('content'))
                <div class="invalid-feedback">
                    {{ $errors->first('content') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="inputForStatus" class="form-label">For status</label>
            <input name="status" type="text" class="form-control @error('status') is-invalid @enderror"
                   value="{{old('status')}}" id="inputForStatus" placeholder="field for status">
            @if($errors->has('status'))
                <div class="invalid-feedback">
                    {{ $errors->first('status') }}
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Create</button>

    </form>
@endsection
