@include('components.doctype')

@include('components.header')

<body>
    <h1>家計簿アプリ</h1>
    @include('components.navi')
        <section class="container">
            <div class="balance">
                <h3>収入</h3>
                <h3>収入一覧</h3>
                @if(session('flash_message'))
                    <div class="flash_message">
                        {{ session('flash_message') }}
                    </div>
                @endif
                @if(session('flash_error_message'))
                    <div class="flash_error_message">
                        {{ session('flash_error_message') }}
                    </div>
                @endif
                <table>
                    <thead>
                        <tr>
                            <th>登録日</th>
                            <th>収入</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach ($in_come as $in_comes)
                            <tr>
                                <td>{{ $in_comes->date }}</td>
                                <td>¥{{number_format ($in_comes->price)}}</td>
                                <td class="button-td">
                                    <form action="{{route('income.income_edit', ['id'=>$in_comes->id])}}" method="">
                                        <input type="submit" value="更新" class="edit-button">
                                    </form>
                                    <form action="{{route('income.destroy', ['id'=>$in_comes->id])}}" method="post">
                                    @csrf
                                    <input type="submit" value="削除" class="delete-button">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            <div class="pagination">

            </div>
        </div>
            <div class="add-balance">
                <h3>収入の追加</h3>
                <form action="{{ route('income.store') }}" method="POST">
                    @csrf
                        <label for="date">日付:</label>
                        <input type="date" id="date" name="date">
                    @if($errors->has('date')) <span class="error">{{$errors->first('date')}}</span> @endif
                        @if($errors->has('category')) <span class="error">{{$errors->first('category')}}</span> @endif
                            <label for="price">金額:</label>
                            <input type="text" id="price" name="price">
                        @if ($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                        <button type="submit">追加</button>
                </form>
            </div>
        </section>
</body>
</html>
