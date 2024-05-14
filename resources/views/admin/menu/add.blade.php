@extends('admin.main')
@section('head')
    <script src="/ckeditor5/ckeditor.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script> --}}
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Ten danh muc</label>
                <input type="text" name="name" class="form-control" id="menu" placeholder="Nhap ten danh muc">
            </div>

            <div class="form-group">
                <label>Danh muc</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Danh muc cha</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Mo ta</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Mo ta chi tiet danh muc</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="">Kich hoat</label>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" value="1" type="radio" id='active' name="active">
                        <label for="active" class="form-check-label">Co</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" type="radio" id='no_active' name="active">
                        <label for="no_active" class="form-check-label">Khong</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tao danh muc</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        window.addEventListener("load", (e) => {
            ClassicEditor
                .create(document.querySelector('#content'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
