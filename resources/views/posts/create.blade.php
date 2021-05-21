@section('content')
  <form route=('posts.create.post') method="post" enctype="multipart/form-data">
    <!-- アップロードフォームの作成 -->
    <input type="file" name="image">
    {{ csrf_field() }}
    @method("PUT")
    <input type="submit" value="投稿する">
  </form>
@endsection