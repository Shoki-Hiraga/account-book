@include('components.doctype')

@include('components.header')

<body>
    <h1>家計簿アプリ</h1>
    @include('components.navi')
        <section class="container">
            <div class="balance">
            <h3>収入</h3>
                <h3>支出一覧</h3>
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
                            <th>日付</th>
                            <th>カテゴリ</th>
                            <th>金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 支出データのループ処理 -->
                         @foreach($homebudgets as $homebudget)​
                         <tr>
                            <td>{{$homebudget->date}}</td>
                            <td>{{$homebudget->category->name}}</td>
                            <td>¥{{number_format ($homebudget->price)}}</td>
                            <td class="button-td">
                                <form action="{{route('homebudget.edit', ['id'=>$homebudget->id])}}" method="">
                                    <input type="submit" value="更新" class="edit-button">
                                </form>
                                <form action="{{route('homebudget.destroy', ['id'=>$homebudget->id])}}" method="post">
                                    @csrf
                                    <input type="submit" value="削除" class="delete-button">
                                </form>
                            </td>
                         </tr>
                         @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{$homebudgets->links()}}
                </div>
            </div>
    
            <div class="add-balance">
                <h3>支出の追加</h3>
                <form action="{{ route('homebudget.store') }}" method="POST">
                    @csrf
                    <label for="date">日付:</label>
                    <input type="date" id="date" name="date">
                    @if($errors->has('date')) <span class="error">{{$errors->first('date')}}</span> @endif
                    <label for="category">カテゴリ:</label>
                    <select name="category" id="category">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
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
