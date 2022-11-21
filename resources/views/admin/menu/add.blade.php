@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="menu">Tên danh mục</label>
        <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
      </div>

      <div class="form-group">
        <label>Danh mục</label>
        <select name="parent_id" class="form-control">
            <option value="0">Danh mục cha</option>
            @foreach ($menus as $menu)
                <option value="{{ $menu->menu_id }}">{{ $menu->name }}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Mô tả chi tiết</label>
        <textarea name="description" class="form-control"></textarea>
      </div>

      <div class="form-group">
            <label>Kích hoạt</label>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked>
                <label for="active" class="custom-control-label">Có</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
      </div>
      
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection