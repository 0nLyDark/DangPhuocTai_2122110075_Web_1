@section('title','Liên hệ')
@extends('layouts.site')
@section('content')
    <section class="content">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-6 col-12">
                    <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.746776096385!2d106.77242407468411!3d10.830680489321376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526ffdc466379%3A0x89b09531e82960d!2zMjAgVMSDbmcgTmjGoW4gUGjDuiwgUGjGsOG7m2MgTG9uZyBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1692683712719!5m2!1svi!2s"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 col-12">
                    <form action="{{ route('site.contact.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" >Họ tên</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập họ tên">
                            @error('name')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" >Điện thoại</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" oninput="allowNumber(event)" class="form-control" maxlength="10" placeholder="Nhập điện thoại">
                            @error('phone')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" >Email</label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Nhập email">
                            @error('email')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" >Tiêu đề</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="Nhập tiêu đề">
                            @error('title')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" >Nội dung</label>
                            <textarea name="content" id="content" class="form-control"
                            placeholder="Nhập nội dung liên hệ">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-info text-start" type="submit" name="GUILIENHE" onclick="" >Gửi liên hệ</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection    
    

