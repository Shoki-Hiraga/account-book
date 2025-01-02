@include('components.doctype')

@include('components.header')

<body>
    <header>
        <h1>収入編集</h1>
    </header>

    <div class="edit-page">
    @include('components.navi')

        <div class="form-balance edit-balance">            
            <form action="{{route('income.update')}}" method="POST">
                @csrf
                @method('put')
                <input type="hidden"  id="id" name="id" value="{{$in_come->id}}">
                <label for="date">日付:</label>
                <input type="date" id="date" name="date" value="{{$in_come->date}}">
                @if($errors->has('date')) <span class="error">{{$errors->first('date')}}</span> @endif

                <label for="price">金額:</label>
                <input type="text" id="price" name="price"  value="{{$in_come->price}}">
                @if ($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif

                <div class="button-container">
                    <button type="submit" class="edit-button">更新</button>
                    <input type="button"  class="back-button" value="戻る" onclick="window.location.href='{{ url('/') }}'">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
